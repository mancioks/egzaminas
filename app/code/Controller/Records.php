<?php

namespace Controller;

use Core\BaseController;
use Helper\Url;
use Helper\Validator;
use Model\Record;
use Model\Topic;

class Records extends BaseController
{
    public function index()
    {
        $records = Record::all();
        $this->render('contact/list', compact('records'));
    }

    public function delete($record_id)
    {
        $record = new Record();
        if ($record->load($record_id)) {
            $record->delete();
            Url::redirect('records');
        } else {
            \Controller\Error::show(404);
        }
    }

    public function show($record_id)
    {
        $record = new Record();
        if ($record->load($record_id)) {
            $record->update(['seen' => 1]);
            $this->render('contact/show', compact('record'));
        } else {
            \Controller\Error::show(404);
        }
    }

    public function reply($record_id)
    {
        $record = new Record();
        if ($record->load($record_id)) {
            $reply = $this->request->post('reply');
            if (Validator::checkAllFilled([$reply])) {
                $record->update(['reply' => $reply]);
                Url::redirect('records/show/' . $record->getId());
            } else {
                $errors = ['Empty fields left'];
                $this->render('parts/errors', compact('errors'));
            }
        } else {
            \Controller\Error::show(404);
        }
    }
}