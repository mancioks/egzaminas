<h1>Contact form</h1>
<form action="<?php echo $this->url('contact/submit'); ?>" method="post">
    <input type="text" name="name" placeholder="name"><br>
    <input type="text" name="surname" placeholder="surname"><br>
    <input type="email" name="email" placeholder="email"><br>
    <input type="text" name="phone" placeholder="phone"><br>
    <input type="text" name="subject" placeholder="subject"><br>
    <select name="topic_id">
        <?php foreach ($this->data['topics'] as $topic): ?>
            <option value="<?= $topic->getId() ?>"><?= $topic->getName() ?></option>
        <?php endforeach; ?>
    </select><br>
    <textarea name="message" placeholder="message"></textarea><br>
    <button type="submit">Contact</button>
</form>