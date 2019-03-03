<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * OrderProduct Controller
 *
 * @property \App\Model\Table\OrderProductTable $OrderProduct
 *
 * @method \App\Model\Entity\OrderProduct[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrderProductController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Orders', 'Product']
        ];
        $orderProduct = $this->paginate($this->OrderProduct);

        $this->set(compact('orderProduct'));
    }

    /**
     * View method
     *
     * @param string|null $id Order Product id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $orderProduct = $this->OrderProduct->get($id, [
            'contain' => ['Orders', 'Product']
        ]);

        $this->set('orderProduct', $orderProduct);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $orderProduct = $this->OrderProduct->newEntity();
        if ($this->request->is('post')) {
            $orderProduct = $this->OrderProduct->patchEntity($orderProduct, $this->request->getData());
            if ($this->OrderProduct->save($orderProduct)) {
                $this->Flash->success(__('The order product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order product could not be saved. Please, try again.'));
        }
        $orders = $this->OrderProduct->Orders->find('list', ['limit' => 200]);
        $product = $this->OrderProduct->Product->find('list', ['limit' => 200]);
        $this->set(compact('orderProduct', 'orders', 'product'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Order Product id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $orderProduct = $this->OrderProduct->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $orderProduct = $this->OrderProduct->patchEntity($orderProduct, $this->request->getData());
            if ($this->OrderProduct->save($orderProduct)) {
                $this->Flash->success(__('The order product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order product could not be saved. Please, try again.'));
        }
        $orders = $this->OrderProduct->Orders->find('list', ['limit' => 200]);
        $product = $this->OrderProduct->Product->find('list', ['limit' => 200]);
        $this->set(compact('orderProduct', 'orders', 'product'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Order Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $orderProduct = $this->OrderProduct->get($id);
        if ($this->OrderProduct->delete($orderProduct)) {
            $this->Flash->success(__('The order product has been deleted.'));
        } else {
            $this->Flash->error(__('The order product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
