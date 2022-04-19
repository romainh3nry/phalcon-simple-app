{%- macro affiche_plante(nom, quantite, prix) %}
<p>Nom : {{ nom }}</p>
<p>Quantite : {{ quantite }}</p>
<p>Prix : {{ prix }}</p>
{%- endmacro%}

<div class="page-header">
    <h1>Congratulations!</h1>
</div>

<p>You're now flying with Phalcon. Great things are about to happen!</p>

<p>This page is located at <code>views/index/index.volt</code></p>

<a href="/utilisateur">Go to users list</a><br>
{{ link_to('utilisateur', 'Go to users list') }}<br>

{{ affiche_plante('prix': '30$', 'nom' : 'Orchidée', 'quantite' : 10) }}