<?php
namespace App\Controller;

use App\Controller\AppController;
// use App\View\Helper\ImageHelper;

/**
 * Product Controller
 *
 * @property \App\Model\Table\ProductTable $Product
 *
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Category']
        ];
        $product = $this->paginate($this->Product);
        // pr($product);die;   

        $this->set(compact('product'));
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $product = $this->Product->get($id, [
            'contain' => ['Category', 'OrderProduct']
        ]);

        $this->set('product', $product);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $product = $this->Product->newEntity();
        if ($this->request->is('post')) {
            if (!empty($this->request->data['image']['name'])) {
                $file_name = $this->request->data['image']['name'];
                $uploadFile = 'img/uploads/'.$file_name;
                if (move_uploaded_file($this->request->data['image']['tmp_name'], $uploadFile)) {
                    $this->request->data['image'] = $file_name;
                }
            }
            $product = $this->Product->patchEntity($product, $this->request->getData());
            if ($this->Product->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $category = $this->Product->Category->find('list', ['limit' => 200]);
        $this->set(compact('product', 'category'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Product->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['put'])) {

            if (!empty($this->request->data['image']['name'])) {
                $file_name = $this->request->data['image']['name'];
                $uploadFile = 'img/uploads/'.$file_name;
                if (move_uploaded_file($this->request->data['image']['tmp_name'], $uploadFile)) {
                    $this->request->data['image'] = 'uploads/'.$file_name;
                }
            }
            else {
                 $this->request->data['image'] = $product->image;
            }
            $product = $this->Product->patchEntity($product, $this->request->getData());

            // pr($product);die;

            if ($this->Product->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $category = $this->Product->Category->find('list', ['limit' => 200]);
        $this->set(compact('product', 'category'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Product->get($id);
        if ($this->Product->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
