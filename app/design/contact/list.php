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
    <?php foreach ($this->data['records'] as $record): ?>
        <tr>
            <td><?= $record->getName() ?></td>
            <td><?= $record->getSurname() ?></td>
            <td><?= $record->getEmail() ?></td>
            <td><?= $record->getPhone() ?></td>
            <td><?= $record->getSubject() ?></td>
            <td><?= $record->getMessage() ?></td>
            <td><?= $record->getTopicName() ?></td>
            <td><?= $record->getSeen() ? "Seen" : "Not seen" ?></td>
            <td><?= $record->getReply() ?></td>
            <td>
                <a href="<?= $this->url('records/delete/' . $record->getId()) ?>">DELETE</a>
                <a href="<?= $this->url('records/show/' . $record->getId()) ?>">SHOW</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
