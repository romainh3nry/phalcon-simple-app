<?php $this->_macros['affiche_plante'] = function($__p = null) { if (isset($__p[0])) { $nom = $__p[0]; } else { if (isset($__p["nom"])) { $nom = $__p["nom"]; } else {  throw new \Phalcon\Mvc\View\Exception("Macro 'affiche_plante' was called without parameter: nom");  } } if (isset($__p[1])) { $quantite = $__p[1]; } else { if (isset($__p["quantite"])) { $quantite = $__p["quantite"]; } else {  throw new \Phalcon\Mvc\View\Exception("Macro 'affiche_plante' was called without parameter: quantite");  } } if (isset($__p[2])) { $prix = $__p[2]; } else { if (isset($__p["prix"])) { $prix = $__p["prix"]; } else {  throw new \Phalcon\Mvc\View\Exception("Macro 'affiche_plante' was called without parameter: prix");  } }  ?>
<p>Nom : <?= $nom ?></p>
<p>Quantite : <?= $quantite ?></p>
<p>Prix : <?= $prix ?></p><?php }; $this->_macros['affiche_plante'] = \Closure::bind($this->_macros['affiche_plante'], $this); ?>

<div class="page-header">
    <h1>Congratulations!</h1>
</div>

<p>You're now flying with Phalcon. Great things are about to happen!</p>

<p>This page is located at <code>views/index/index.volt</code></p>

<a href="/utilisateur">Go to users list</a><br>
<?= $this->tag->linkTo(['utilisateur', 'Go to users list']) ?><br>

<?= $this->callMacro('affiche_plante', ['prix' => '30$', 'nom' => 'Orchidée', 'quantite' => 10]) ?>