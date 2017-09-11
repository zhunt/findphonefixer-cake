<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Form\ReportErrorForm;


/**
 * ContactForm Controller
 *
 *
 * @method \App\Model\Entity\ContactForm[] paginate($object = null, array $settings = [])
 */
class ContactFormController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow( ['index', 'reportVenueError']); // make these pages public
    }


    public function index()
    {
        $contact = new ReportErrorForm();
        if ($this->request->is('post')) {
            if ($contact->execute($this->request->getData())) {

                debug($this->request->getData());
                $this->Flash->success('We will get back to you soon.');
            } else {
                $this->Flash->error('There was a problem submitting your form.');
                $errors = $contact->errors();
                debug($errors);
            }
        }

        if ($this->request->is('get')) {
            // Values from the User Model e.g.

            $this->loadModel('Venues');
            $jsonData = $this->Venues->find('all')->where(['Venues.id' => 1178  ])->contain(['Cities'])->first(); // debug($jsonData->toArray() );
            $this->set('jsonData', $jsonData);

            // $this->request->getData('json_data', $jsonData);
            //$this->request->getData('hours_wrong', true);
          //  $this->request->getData('other_error','Text goes here');

          //  $this->request->withData('venue_closed', true );
  //          $this->request->data('other_error', "default text");
//
  //        $this->request->data('hours_wrong', true);

        }

        $this->set('contact', $contact);  //debug($contact);
    }


    // http://localhost:8085/contact-form/report-venue-error
    public function reportVenueError($id) {
        // ming-wireless


        $contact = new ReportErrorForm();
        if ($this->request->is('post')) {
            if ($contact->execute($this->request->getData())) { debug($this->request->getData());

                debug($this->request->getData());
                $this->Flash->success('We will get back to you soon.'); // debug('/venue/' . $this->request->getData('venue_slug') ); exit;
                $this->redirect('/venue/' . $this->request->getData('venue_slug') );
            } else {
                $this->Flash->error('There was a problem submitting your form.');
                $errors = $contact->errors();
                //debug($errors);
            }
        }

        //if ($this->request->is('get')) {
            // look up venue by slug
        $this->loadModel('Venues');

        $venue = $this->Venues->findBySlug($id)->first();

        if ($venue) {

            $this->set('venue', $venue);
            $this->set('contact', $contact);
            $this->set('_serialize', ['venue']);

        } else {
            // nothing found, exit;
            $this->Flash->error('There was a problem finding the venue. Please go back to page.');
        }

        //}



        //
    }




    /**
     * View method
     *
     * @param string|null $id Contact Form id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contactForm = $this->ContactForm->get($id, [
            'contain' => []
        ]);

        $this->set('contactForm', $contactForm);
        $this->set('_serialize', ['contactForm']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contactForm = $this->ContactForm->newEntity();
        if ($this->request->is('post')) {
            $contactForm = $this->ContactForm->patchEntity($contactForm, $this->request->getData());
            if ($this->ContactForm->save($contactForm)) {
                $this->Flash->success(__('The contact form has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contact form could not be saved. Please, try again.'));
        }
        $this->set(compact('contactForm'));
        $this->set('_serialize', ['contactForm']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Contact Form id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contactForm = $this->ContactForm->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contactForm = $this->ContactForm->patchEntity($contactForm, $this->request->getData());
            if ($this->ContactForm->save($contactForm)) {
                $this->Flash->success(__('The contact form has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contact form could not be saved. Please, try again.'));
        }
        $this->set(compact('contactForm'));
        $this->set('_serialize', ['contactForm']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Contact Form id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contactForm = $this->ContactForm->get($id);
        if ($this->ContactForm->delete($contactForm)) {
            $this->Flash->success(__('The contact form has been deleted.'));
        } else {
            $this->Flash->error(__('The contact form could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
