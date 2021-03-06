<?php
 //file: view/posts/index.php

 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();

 $product = $view->getVariable("product");
 $currentuser = $view->getVariable("currentusername");
 $view->setVariable("title", "Product");

?>

<html lang="en">
  <body>

    <article id = "maincontent">
      <div class = "main">

        <img class="view-photo" src="imgs/producto/<?=$product->getPhoto() ?>">
        <div class="view-info">
          <div class="product-info">
            <p class = "titulo view-tittle"> <?=$product->getTitle() ?></p>
          	<p class = "precio view-prize"> <?=$product->getPrize() ?>€</p>
          	<p class = "descripcion view-description"> <?=$product->getDescription() ?></p>
          </div>
          <div class="product-info seller-product">
            <a href="index.php?controller=products&amp;action=viewMyProducts&amp;alias=<?=$product->getSeller()->getAlias() ?>">
              <div class="view-seller">
                    <?php if ($product->getSeller()->getPhoto() == NULL){ ?>
                      <img class="seller-info" src = "imgs/perfil/predeterminado.jpg" >
                    <?php }else{ ?>
                      <img class="seller-info" src = "imgs/perfil/<?=$product->getSeller()->getPhoto() ?>">
                    <?php } ?>
                    <strong> <?=$product->getSeller()->getAlias() ?></strong>
              </div>
            </a>

            <?php
            if (isset($_SESSION["currentuser"])){
              if($product->getSeller()->getAlias()!=$currentuser){
              ?><form action="index.php?controller=chats&amp;action=add" method="post" id = "my_form">
                  <input type="hidden" name="product_id" value="<?=$product->getId()?>">
                  <input type="hidden" name="vendedor_alias" value="<?=$product->getSeller()->getAlias()?>">
                <a onclick="document.getElementById('my_form').submit();">
                  <div   class="btn-chat"><p><i class="fa fa-comments" aria-hidden="true"></i>Chat</p></div>
                </a>
                </form>
            <?php }else{?>
              <div>
                  <a href="index.php?controller=products&amp;action=delete&amp;product_id=<?=$product->getId()?>">
                    <div class="btn-chat">
                      <p><i class="fa fa-times-circle-o" aria-hidden="true"></i> <?= i18n("Delete") ?></p>
                    </div>
                  </a>
                  <a href="index.php?controller=products&amp;action=edit&amp;product_id=<?=$product->getId()?>">
                      <div class="btn-chat">
                          <p><i class="fa fa-pencil-square-o" aria-hidden="true"></i> <?= i18n("Edit") ?></p>
                      </div>
                  </a>
              </div>
            <?php }
            }?>
          </div>
        </div>



      </div>
    </article>

  </body>
  </html>
