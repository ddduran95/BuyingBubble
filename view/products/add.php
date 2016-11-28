<?php
 //file: view/products/add.php
 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();

 $product = $view->getVariable("product");
 $errors = $view->getVariable("errors");

 $view->setVariable("title", "Edit Post");

?><h1><?= i18n("Create product")?></h1>
      <form enctype = "multipart/form-data" action="index.php?controller=products&amp;action=add" method="POST">
        <input type="hidden" name="MAX_FILE_SIZE" value="1000000" class="input"/>

  	    <?= i18n("Title") ?>: <input type="text" name="title">
  	    <?= isset($errors["title"])?$errors["title"]:"" ?><br>

  	    <?= i18n("Description") ?>: <br>
  	    <textarea name="description" rows="4" cols="50"></textarea>
  	    <?= isset($errors["description"])?$errors["description"]:"" ?><br>

        <?= i18n("Prize") ?>: <input type="number" name="prize">
  	    <?= isset($errors["prize"])?$errors["prize"]:"" ?><br>

        <?= i18n("Photo") ?>: <input type="file" name="photo">
  	    <?= isset($errors["photo"])?$errors["photo"]:"" ?><br>

  	    <input type="submit" name="submit" value="submit">
      </form>
