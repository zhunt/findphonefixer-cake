<?php
namespace App\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;

use Cake\Core\Configure;
use Cake\Mailer\Email;



/**
 * ReportError Form.
 */
class ReportErrorForm extends Form
{
    /**
     * Builds the schema for the modelless form
     *
     * @param \Cake\Form\Schema $schema From schema
     * @return \Cake\Form\Schema
     */
    protected function _buildSchema(Schema $schema)
    {
        //return $schema;

        return $schema
            ->addField('venue_slug', 'string')
            ->addField('venue_id', 'integer')
            ->addField('venue_closed', 'boolean')
            ->addField('hours_wrong', 'boolean')
            ->addField('phone_wrong', 'boolean')
            ->addField('other_error', 'text');

    }

    /**
     * Form validation builder
     *
     * @param \Cake\Validation\Validator $validator to use against the form
     * @return \Cake\Validation\Validator
     */
    protected function _buildValidator(Validator $validator)
    {
        return $validator->add('venue_slug', 'length', [
            'rule' => ['minLength', 10],
            'message' => 'A name is required'
        ])->notEmpty('venue_id', "need venue id")
            ->notEmpty('venue_slug', "need venue slug")
            ->requirePresence(['venue_id', 'venue_slug']);
    }

    /**
     * Defines what to execute once the From is being processed
     *
     * @param array $data Form data.
     * @return bool
     */
    protected function _execute(array $data)
    {

        $sender = 'error-reports@findphonefixer.com';// Configure::read('adminEmail');
        $websiteName = Configure::read('websiteName');

/*
        Email::configTransport('gmail', [
            'host' => 'smtp.gmail.com',
            'port' => 587,
            'username' => Configure::read('adminEmail'),
            'password' => Configure::read('adminEmailPw'),
            'className' => 'Smtp',
            'tls' => true
        ]);
*/

        Email::configTransport('server', [
            'host' => 'mail.findphonefixer.com',
            'port' => 587,
            'username' => 'error-reports@findphonefixer.com', //Configure::read('adminEmail'),
            'password' => 'Blackbird1er!', //Configure::read('adminEmailPw'),
            'className' => 'Smtp',
           // 'tls' => true
        ]);  



        $email = new Email(['from' => $sender, 'transport' => 'server']);

        // $editLink = Configure::read('siteUrlFull') .'/admin/articles/edit/' . $article->id . '/';
        //$emailMessage = "An Article Has Been Submitted:\n{$article->name}\n\nBy: {$article->author}/{$article->url}\n\nView here: {$editLink}";

        $emailMessage = 'An error was reported for a venue: ' . $data['venue_slug'];

        foreach ($data as $i => $row) {
            $emailMessage = $emailMessage . "\n {$i}: {$row}";
        }

        //debug($emailMessage);

        $email->from([$sender => $websiteName  ])
            ->to('zhunt@yyztech.ca')
            ->subject('New Venue Error Submitted to ' . $websiteName )
            ->send($emailMessage);

        return true;
    }
}
