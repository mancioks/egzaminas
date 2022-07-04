<h1>List</h1>
<table>
    <tr>
        <td>name</td>
        <td>surname</td>
        <td>email</td>
        <td>phone</td>
        <td>subject</td>
        <td>message</td>
        <td>topic</td>
        <td>seen</td>
        <td>reply</td>
        <td>action</td>
    </tr>
    <tr>
        <td><?= $this->data['record']->getName() ?></td>
        <td><?= $this->data['record']->getSurname() ?></td>
        <td><?= $this->data['record']->getEmail() ?></td>
        <td><?= $this->data['record']->getPhone() ?></td>
        <td><?= $this->data['record']->getSubject() ?></td>
        <td><?= $this->data['record']->getMessage() ?></td>
        <td><?= $this->data['record']->getTopicName() ?></td>
        <td><?= $this->data['record']->getSeen() ? "Seen" : "Not seen" ?></td>
        <td><?= $this->data['record']->getReply() ?></td>
        <td>
            <a href="<?= $this->url('records/delete/' . $this->data['record']->getId()) ?>">DELETE</a>
        </td>
    </tr>
</table>
<h2>Reply</h2>
<form action="<?php echo $this->url('records/reply/' . $this->data['record']->getId()); ?>" method="post">
    <textarea name="reply" placeholder="Message"></textarea><br>
    <button type="submit">Reply</button>
</form>