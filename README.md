# Initial considerations and Blitz Framework

* A Small alternative PHP Framework, focusing on small and light projects using MVC (Model, View, Controller) architecture.
* Where:
  * Model is where the logic of the application stays.
     * Querys.
     * Requisitions.
     * Email sending.
     * Etc...
  * View is the layer that contains the data to be sent to the user's browser.
     * HTML.
     * JSON.
     * Forms.
     * Logs.
     * Anything you want to be sent to the browser.
  * Controller says when things will happen.
	   * Calls, retains and exchanges data from one or more models or views.

---
### Features:
* [Router](https://github.com/bramus/router);
* [Session](https://github.com/Bistro/session);
* [Database](https://github.com/salebab/database);
* [Template](https://github.com/thephpleague/plates);
* [Validation Input Data](https://github.com/Wixel/GUMP);
* MVC;
* Confs file;
* Easy support custom helpers;
* Controller with support many output's formats data (json, html, plain...);

### Requisites:
* PHP 5.3 >=
* Server, like apache2, with module rewrite enabled

---
# Blitz Framework structure
* `app` folder.
	- `controllers` and `models` folders keep the controllers and the models, respectively.(duh)
	- The `view` folder has some other folders and files on it.
		- `assets` folder keeps all sorts of content to be used on client side, such as JS, CSS, PNG and etc...
			- Store it in another place will require changes in `.htaccess` file, to grant access permission.
		- `pages` folder keeps the views.
		- `templates` folder, where the templates are kept.
	- `helpers` folder. Keeps the generic support functions that may be used on the whole application, like formatters, uploaders and whatnot.
		- To use a helper, you must declare him in the `confs.php` file, on the `$settings['app_helpers']` stretch.
	- `confs.php` is the responsible for a lot of configurations, like the author, DB login and password, gzip, error handling and other things, including the `{url}` global var. This is a variable where you set your application path inside the OS, and on the rest of the application, dont need to keep using barbaric techniques like `../../app/views/assets/myfile.js`, just `{url}/app/views/assets/myfile.js`, it even faster for the browser.
	- `routs.php` file, used to link a application URL to a action inside a controller.
* `vendor` folder. Only keeps things needed to run, you will not build your application here.
	- `core` folder.
		- Keeps the classes you will extend on `app/*`.
	- `libs` folder. Keeps the **Features** files.
	- `Bootstrap.php` file.
		- Does not improve your front-end results. Only dictates some framework behaviours.

---
# Blitz Framework MVC basic working
## Routs
* A route have its behavior set in `routs.php`, and will look like this:
```php
$this->router->get('/adm/user/cadastro', function (){
      $this->callController('user', 'show');
});
$this->router->post('/adm/user/cadastro', function (){
      $this->callController('user', 'insert');
});
```
* Notice that the same URL can behave different based on the kind of request.
	- On the example above, we call `/adm/user/cadastro` on both routs, and in both cases we call the 'user' controller, but a GET request will trigger the 'show' action, and a POST request will trigger the 'insert' action.
* Theres even the possibility to apply standard actions to all urls, like the login credential verification:
```php
$this->router->before('GET|POST', '/adm/.*', function() {
    $this->callController('userLogin', 'isvalidlogin');
});
```
* This route will intercept every request to a URL containing '/adm' and call `isvalidlogin` action.

---
## Controllers
* A controller is composed by one or more methods, called 'actions'. They are called like that because they literally receive 'action' on their name, **but its not included when they're called on the route**, watch closely, a method called `ActionIndex` will be called on router only by `Index`.
* Controllers are the backbone of the framework, they are the ones who call models and views, deciding how and when everyting will be done.
* See below a controller example:
```php
  public function actionShow() {
		// Capture and validate the GET data.
        $this->inputStart($_GET);

        $this->inputAddValidation(array(
            'id' => 'required|integer|min_len,1'
        ));

		// Put the GET data on $data.
        $data = $this->getInputData();

        if (is_null($data)) {
			// outputs the view inside \app\views\pages\index\store-cadastro.php
            $this->outputPage('index::store-cadastro');
        } else {
			// instantiating a model.
            $store = new Store();
            $store->id = $data['id'];
			// outputs the view inside \app\views\pages\index\store-cadastro.php with the data on $store->getData().
			// On the view, this data will be accessible by $store var.
            $this->outputPage('index::store-cadastro', array(
                'store' => $store->getData()
            ));
        }
    }
```
### Using models
* To call a model inside a controller, import and declare it:
```php
\blitz\vendor\core\Model::import('Store');
use \blitz\app\models\Store as Store;
```
### Receiving data from views
* On the example controller, notice that `inputStart()` and `getInputData()` are the way to communicate the view with the controller, while `inputAddValidation()` sanitizes everything before we can work with it, because on server side we dont trust world wide web or js. Thanks to [GUMP](https://github.com/Wixel/GUMP).
* To load a view and give it the model's data, do:
```php
  $this->outputPage('index::post', array(
                'data' => $order->getDetailsOrder($data['id'])
            ));
```
* Where `outputPage` will load the view. Notice that in the example above, we are loading the view `post`, thats inside `index` folder, thats why the `index::` prefix.
	- Inside this view, we can access the object `$data` to retrieve the data from `$order->getDetailsOrder($data['id'])`.


---
## Models
* The models are the manual workers of our framework, created and called for specific needs each, but in general can deliver a great range of tasks.
* The following model, for example, make a query and return values:
```php
public function confirmOrder() {
            $count = $this->getConn()
                    ->select('count(1) as exists')
                    ->from('VIEW_ORDERS')
                    ->where('store_id = ? and id = ?', [$this->store_id, $this->id])
                    ->execute()
                    ->fetchInto($this);

        return $count;
    }
```
* A model is only called by a controller.
* Do not forget that OOP is a paradigm, not just a syntax.
* Thanks to [Salebab/Database](https://github.com/salebab/database) for the PDO wrapper with query builder.

---
## views
* The views are what the name suggests: The HTML to the end user.
* Receive data from the controller by the objects passed from it.
* Its only the page's "body".
* The structure seen on browser is a combination of view and template.
	- The **template** is the "header".
	- Where we got the *<head> tag* and import scripts.
	- Is the place for general actions commom to all pages to be applied, like js, modals, etc...

---
# Author:

* Fernando Batels <luisfbatels@gmail.com>
