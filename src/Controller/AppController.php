<?php
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');
        /*
         * Enable the following component for recommended CakePHP security settings.
         */
        // $this->loadComponent('Security');
        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            'storage' => 'Session',
             //use isAuthorized in Controllers
            // 'authorize' => ['Controller'],
             // If unauthorized, return them to page they were just on
            'unauthorizedRedirect' => $this->referer()
        ]);

        // // Allow the display action so our PagesController
        // // continues to work. Also enable the read only actions.
        $this->Auth->allow(['view', 'index', 'view2', 'search', 'ajax', 'shoppingCart']);
    }

    public function beforeRender(Event $event) {
        $this->set('user_session', $this->request->session()->read('Auth'));
    }

    public function category() {
        $this->loadModel('Category');
        $category = $this->Category->find('all');
        $this->set(compact('category'));
    } 

    public function cookie_cart() {
        if(isset($_COOKIE['cart'])) {
            $cookie_data = stripcslashes($_COOKIE['cart']);
            $cart_data = json_decode($cookie_data, true);
            $count_cart = count($cart_data);
        }
        $this->set('count_cart', $count_cart);
    }
    
}
