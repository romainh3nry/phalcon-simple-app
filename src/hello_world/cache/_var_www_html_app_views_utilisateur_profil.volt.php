<?php $this->_macros['afficher_profil'] = function($__p = null) { if (isset($__p[0])) { $id = $__p[0]; } else { if (isset($__p["id"])) { $id = $__p["id"]; } else {  throw new \Phalcon\Mvc\View\Exception("Macro 'afficher_profil' was called without parameter: id");  } } if (isset($__p[1])) { $firstname = $__p[1]; } else { if (isset($__p["firstname"])) { $firstname = $__p["firstname"]; } else {  throw new \Phalcon\Mvc\View\Exception("Macro 'afficher_profil' was called without parameter: firstname");  } } if (isset($__p[2])) { $lastname = $__p[2]; } else { if (isset($__p["lastname"])) { $lastname = $__p["lastname"]; } else {  throw new \Phalcon\Mvc\View\Exception("Macro 'afficher_profil' was called without parameter: lastname");  } } if (isset($__p[3])) { $email = $__p[3]; } else { if (isset($__p["email"])) { $email = $__p["email"]; } else {  throw new \Phalcon\Mvc\View\Exception("Macro 'afficher_profil' was called without parameter: email");  } }  ?>
<p>Id : <?= $id ?></p>
<p>Firstname : <?= $firstname ?></p>
<p>Lastname : <?= $lastname ?></p>
<p>Email : <?= $email ?></p>
<?php }; $this->_macros['afficher_profil'] = \Closure::bind($this->_macros['afficher_profil'], $this); ?>

<h3>Profil</h3>

<?php if ($user) { ?>
<?= $this->callMacro('afficher_profil', [$user->id, $user->firstname, $user->lastname, $user->email]) ?>
<?php } else { ?>
<p>User not valid</p>
<?php } ?>