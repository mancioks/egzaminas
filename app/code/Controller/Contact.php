<?php

namespace Controller;

use Core\BaseController;
use Helper\Url;
use Helper\Validator;
use Model\Record;
use Model\Topic;

class Contact extends BaseController
{
    public function submit()
    {
        $name = $this->request->post('name');
        $surname = $this->request->post('surname');
        $email = $this->request->post('email');
        $phone = $this->request->post('phone');
        $subject = $this->request->post('name');
        $topic_id = $this->request->post('topic_id');
        $message = $this->request->post('message');

        $errors = [];

        // validation
        if (!Validator::checkAllFilled([$name, $surname, $email, $subject, $message, $topic_id])) {
            $errors[] = 'Empty fields left';
        }
        if(!Validator::checkEmail($email)) {
            $errors[] = 'Wrong email';
        }
        if(!(new Topic())->load($topic_id)) {
            $errors[] = 'Wrong topic id';
        }

        if ($errors) {
            $this->render('parts/errors', compact('errors'));
        } else {
            $record = new Record();

            $record->create([
                'name' => $name,
                'surname' => $surname,
                'email' => $email,
                'phone' => $phone,
                'subject' => $subject,
                'message' => $message,
                'topic_id' => $topic_id,
                'seen' => 0,
            ]);

            Url::redirect('records');
        }
    }
}