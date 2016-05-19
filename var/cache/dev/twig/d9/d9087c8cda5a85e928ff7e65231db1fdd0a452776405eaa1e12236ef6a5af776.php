<?php

/* LouvresCommandeBundle:Commande:index.html.twig */
class __TwigTemplate_8c20b8801c05bcd13c124b5a9ea211655f299285c3e1810f9ca674c1173c76a3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("LouvresCommandeBundle::layout.html.twig", "LouvresCommandeBundle:Commande:index.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'nav' => array($this, 'block_nav'),
            'body' => array($this, 'block_body'),
            '__internal_957ed739fa53fb3233a6f83bf59850adfb662e55a6db31e74280ec8da4223f6f' => array($this, 'block___internal_957ed739fa53fb3233a6f83bf59850adfb662e55a6db31e74280ec8da4223f6f'),
            'footer' => array($this, 'block_footer'),
            'javascript' => array($this, 'block_javascript'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "LouvresCommandeBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_bdcedac37a413650df80c641b62690da555a77995357c3778b240acbf3f29270 = $this->env->getExtension("native_profiler");
        $__internal_bdcedac37a413650df80c641b62690da555a77995357c3778b240acbf3f29270->enter($__internal_bdcedac37a413650df80c641b62690da555a77995357c3778b240acbf3f29270_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "LouvresCommandeBundle:Commande:index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_bdcedac37a413650df80c641b62690da555a77995357c3778b240acbf3f29270->leave($__internal_bdcedac37a413650df80c641b62690da555a77995357c3778b240acbf3f29270_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_6ee9c6cf40bebec284f7a3cf82ebd61971331165c51fcf804451b44b4f802787 = $this->env->getExtension("native_profiler");
        $__internal_6ee9c6cf40bebec284f7a3cf82ebd61971331165c51fcf804451b44b4f802787->enter($__internal_6ee9c6cf40bebec284f7a3cf82ebd61971331165c51fcf804451b44b4f802787_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 4
        echo "    Billetterie - Musée du Louvres
";
        
        $__internal_6ee9c6cf40bebec284f7a3cf82ebd61971331165c51fcf804451b44b4f802787->leave($__internal_6ee9c6cf40bebec284f7a3cf82ebd61971331165c51fcf804451b44b4f802787_prof);

    }

    // line 7
    public function block_nav($context, array $blocks = array())
    {
        $__internal_f2d04afc1d9cf782a91685e2a03bb88362975324033b71af404379623dcf0e8b = $this->env->getExtension("native_profiler");
        $__internal_f2d04afc1d9cf782a91685e2a03bb88362975324033b71af404379623dcf0e8b->enter($__internal_f2d04afc1d9cf782a91685e2a03bb88362975324033b71af404379623dcf0e8b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "nav"));

        // line 8
        echo "    ";
        $this->displayParentBlock("nav", $context, $blocks);
        echo "
";
        
        $__internal_f2d04afc1d9cf782a91685e2a03bb88362975324033b71af404379623dcf0e8b->leave($__internal_f2d04afc1d9cf782a91685e2a03bb88362975324033b71af404379623dcf0e8b_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_497883771b35cf8c627d7425f9d00c48f2fed83c4691e574cd2fa072815922a3 = $this->env->getExtension("native_profiler");
        $__internal_497883771b35cf8c627d7425f9d00c48f2fed83c4691e574cd2fa072815922a3->enter($__internal_497883771b35cf8c627d7425f9d00c48f2fed83c4691e574cd2fa072815922a3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    <!-- En tête blanche -->
    <div class=\"header\">
        <div class=\"container-fluid\">
            <div class=\"header_texte row\">
                <div class=\"col-xs-12 col-sm-12\">
                    <h1>Musée du Louvre</h1>
                    <p>Bienvenue sur la plateforme de réservation de billets en ligne.</p>
                    <div class=\"hidden-xs\">
                        <p>N'attendez plus en caisse et profitez plus rapidement des expositions.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Premier encart gris : 1.Choisissez la date -->
    <div class=\"encart_gris\">
        <div class=\"container-fluid\">
            <p>1. Choisissez la date</p>
        </div>
    </div>

    <!-- Datepicker  -->
    <div class=\"date_picker\">
        <div class=\"container row\">
            ";
        // line 38
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["formCommande"]) ? $context["formCommande"] : $this->getContext($context, "formCommande")), 'form_start', array("action" => $this->env->getExtension('routing')->getPath("Louvres_commande_home")));
        echo "
            ";
        // line 39
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["formCommande"]) ? $context["formCommande"] : $this->getContext($context, "formCommande")), 'errors');
        echo "
            ";
        // line 40
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formCommande"]) ? $context["formCommande"] : $this->getContext($context, "formCommande")), "dateVisite", array()), 'widget', array("attr" => array("id" => "datepicker", "class" => "col-sm-6 col-md-5 col-lg-4")));
        echo "
        <!--    <div id=\"datepicker\" class=\"col-sm-6 col-md-5 col-lg-4\">
            </div> -->
            <div class=\"legende hidden-xs col-sm-4 col-md-3 col-lg-3\">
                <div class=\"row\">
                    <div class=\"legend_select col-sm-offset-1 col-sm-1\">
                    </div>
                    <p class=\"col-sm-9\">Date sélectionnée</p>
                </div>

                <div class=\"row\">
                    <div class=\"legend_ouvert col-sm-offset-1 col-sm-1\">
                    </div>
                    <p class=\"col-sm-9\">Ouvert</p>
                </div>

                <div class=\"row\">
                    <div class=\"legend_ferme col-sm-offset-1 col-sm-1\">
                    </div>
                    <p class=\"col-sm-9\">Fermé</p>
                </div>

                <div class=\"row\">
                    <div class=\"legend_complet col-sm-offset-1 col-sm-1\">
                    </div>
                    <p class=\"col-sm-9\">Complet</p>
                </div>
            </div>
        </div>
    </div>


    <!-- Deuxième encart gris : 2.Choisissez le type de billets -->
    <div class=\"encart_gris\">
        <div class=\"container-fluid\">
            <p>2. Choisissez le type de billet</p>
        </div>
    </div>

    <!-- Selection du type de billet-->
    <div class=\"type_billet\">
        <div class=\"container row\">
            <p id=\"date_selectionnee\">
                Veuillez d'abord selectionner une date.
            </p>
            <!--Forumaire pour le type de billet-->
            <div id=\"form_type_billet\">
                ";
        // line 87
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["formCommande"]) ? $context["formCommande"] : $this->getContext($context, "formCommande")), "typeBillet", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
            // line 88
            echo "                    <div class=\"radio\">
                        ";
            // line 89
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["child"], 'widget', array("attr" => array("class" => $this->getAttribute($this->getAttribute($context["child"], "vars", array()), "label", array()))));
            echo "
                        ";
            // line 90
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["child"], "vars", array()), "label", array()), "html", null, true);
            echo "
                    </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 93
        echo "            </div>
        </div>
    </div>

    <!-- Troisième encart gris : 3.Choisissez le nombre de billets -->
 <!--   <div class=\"encart_gris\">
        <div class=\"container-fluid\">
            <p>3. Choisissez le nombre de billets</p>
        </div>
    </div> -->

    <!-- Selection du nombre de billets
    <div id=\"nbr_billet\">
        <div class=\"container row\">
            <div class=\"form-horizontal tableau_tarifs\">
                <div class=\"row form-group\">
                 ";
        // line 110
        echo "                  ";
        // line 111
        echo "                    <div class=\"select col-xs-4 col-sm-3 col-md-2\">
                    ";
        // line 113
        echo "                    </div>
                </div>
            </div>
        </div>
    </div>-->

    <!-- Quatrième encart gris : 4.Renseignez ces informations -->
    <div class=\"encart_gris\">
        <div class=\"container-fluid\">
            <p>3. Choisissez le nombre de billets</p>
        </div>
    </div>

    <!-- Renseignements des coordonnées-->
    <div id=\"info_visiteur\">
        <div class=\"container\">
            <div id=\"billet\">
            <!-- Formulaire type pour les billets normal, enfant, réduit, senior et famille --->
                <div class=\"billets\" data-prototype=\"
                ";
        // line 132
        echo twig_escape_filter($this->env, (string) $this->renderBlock("__internal_957ed739fa53fb3233a6f83bf59850adfb662e55a6db31e74280ec8da4223f6f", $context, $blocks));
        // line 134
        echo "\">
                </div>
            </div>
        </div>
    </div>


<!-- Cinquième encart gris : 5. Récapitulatif de la commande -->
    <div class=\"encart_gris\">
        <div class=\"container-fluid\">
            <p>4. Récapitulatif de la commande</p>
        </div>
    </div>

    <!-- Jour de visite + nombre de billets de chaque catégorie + prix total-->
    <div id=\"prix_total\">
        <p id=\"verif\">Veuillez saisir tous les champs pour valider la commande</p>
        <div id=\"detail_commande\">
            <p>Jour de la visite : <span id=\"jour_visite\"></span><span id=\"type_billet\"></span></p>
            <p> Nombre de billets : <span id=\"nombre_billets\"></span></p>
            <div id=\"details_billets\"></div>
            <p id =\"total_commande\"><strong>Total de la commande : <span id=\"prix\">0 €</span></strong></p>
        </div>
    <!--   <button id=\"btn-reset\" type=\"submit\" class=\"btn btn-warning btn-sm col-sm-offset-4 col-xs-offset-1\">Reset</button> -->
        ";
        // line 158
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formCommande"]) ? $context["formCommande"] : $this->getContext($context, "formCommande")), "valider", array()), 'widget', array("attr" => array("class" => "btn btn-default btn-sm col-sm-offset-4 col-xs-offset-1", "id" => "btn-valider")));
        echo "
    <!--    <button id=\"btn-valider\" type=\"submit\" class=\"btn btn-default btn-sm col-sm-offset-4 col-xs-offset-1\">Valider la commande</button> -->
        ";
        // line 160
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["formCommande"]) ? $context["formCommande"] : $this->getContext($context, "formCommande")), 'rest');
        echo "
        ";
        // line 161
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["formCommande"]) ? $context["formCommande"] : $this->getContext($context, "formCommande")), 'form_end');
        echo "
    </div>

";
        
        $__internal_497883771b35cf8c627d7425f9d00c48f2fed83c4691e574cd2fa072815922a3->leave($__internal_497883771b35cf8c627d7425f9d00c48f2fed83c4691e574cd2fa072815922a3_prof);

    }

    // line 132
    public function block___internal_957ed739fa53fb3233a6f83bf59850adfb662e55a6db31e74280ec8da4223f6f($context, array $blocks = array())
    {
        $__internal_62405727e89e00b4959aef17677247586fda7b3a092adbc373d64da9cfa3020f = $this->env->getExtension("native_profiler");
        $__internal_62405727e89e00b4959aef17677247586fda7b3a092adbc373d64da9cfa3020f->enter($__internal_62405727e89e00b4959aef17677247586fda7b3a092adbc373d64da9cfa3020f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "__internal_957ed739fa53fb3233a6f83bf59850adfb662e55a6db31e74280ec8da4223f6f"));

        // line 133
        echo "                    ";
        echo twig_include($this->env, $context, "LouvresCommandeBundle:Commande:prototype.html.twig", array("form" => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["formCommande"]) ? $context["formCommande"] : $this->getContext($context, "formCommande")), "billets", array()), "vars", array()), "prototype", array())));
        echo "
                ";
        
        $__internal_62405727e89e00b4959aef17677247586fda7b3a092adbc373d64da9cfa3020f->leave($__internal_62405727e89e00b4959aef17677247586fda7b3a092adbc373d64da9cfa3020f_prof);

    }

    // line 166
    public function block_footer($context, array $blocks = array())
    {
        $__internal_0bcd2360b3fb3e20b514348620a63e0a9ab70a40ad4bd98febcdca635657caff = $this->env->getExtension("native_profiler");
        $__internal_0bcd2360b3fb3e20b514348620a63e0a9ab70a40ad4bd98febcdca635657caff->enter($__internal_0bcd2360b3fb3e20b514348620a63e0a9ab70a40ad4bd98febcdca635657caff_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "footer"));

        // line 167
        $this->displayParentBlock("footer", $context, $blocks);
        echo "
";
        
        $__internal_0bcd2360b3fb3e20b514348620a63e0a9ab70a40ad4bd98febcdca635657caff->leave($__internal_0bcd2360b3fb3e20b514348620a63e0a9ab70a40ad4bd98febcdca635657caff_prof);

    }

    // line 170
    public function block_javascript($context, array $blocks = array())
    {
        $__internal_89c916b6d1c369d921459aec247a0af76185bf77af5f1259e402b5b82727d931 = $this->env->getExtension("native_profiler");
        $__internal_89c916b6d1c369d921459aec247a0af76185bf77af5f1259e402b5b82727d931->enter($__internal_89c916b6d1c369d921459aec247a0af76185bf77af5f1259e402b5b82727d931_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascript"));

        // line 171
        $this->displayParentBlock("javascript", $context, $blocks);
        echo "
";
        // line 172
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "5997e79_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_5997e79_0") : $this->env->getExtension('asset')->getAssetUrl("_controller/js/5997e79_commande2_1.js");
            // line 175
            echo "<script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
";
            // asset "5997e79_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_5997e79_1") : $this->env->getExtension('asset')->getAssetUrl("_controller/js/5997e79_jquery.flagstrap.min_2.js");
            echo "<script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
";
        } else {
            // asset "5997e79"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_5997e79") : $this->env->getExtension('asset')->getAssetUrl("_controller/js/5997e79.js");
            echo "<script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
";
        }
        unset($context["asset_url"]);
        
        $__internal_89c916b6d1c369d921459aec247a0af76185bf77af5f1259e402b5b82727d931->leave($__internal_89c916b6d1c369d921459aec247a0af76185bf77af5f1259e402b5b82727d931_prof);

    }

    public function getTemplateName()
    {
        return "LouvresCommandeBundle:Commande:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  318 => 175,  314 => 172,  310 => 171,  304 => 170,  295 => 167,  289 => 166,  279 => 133,  273 => 132,  262 => 161,  258 => 160,  253 => 158,  227 => 134,  225 => 132,  204 => 113,  201 => 111,  199 => 110,  181 => 93,  172 => 90,  168 => 89,  165 => 88,  161 => 87,  111 => 40,  107 => 39,  103 => 38,  75 => 12,  69 => 11,  59 => 8,  53 => 7,  45 => 4,  39 => 3,  11 => 1,);
    }
}
/* {% extends "LouvresCommandeBundle::layout.html.twig" %}*/
/* */
/* {% block title %}*/
/*     Billetterie - Musée du Louvres*/
/* {% endblock %}*/
/* */
/* {% block nav %}*/
/*     {{ parent() }}*/
/* {% endblock %}*/
/* */
/* {% block body %}*/
/*     <!-- En tête blanche -->*/
/*     <div class="header">*/
/*         <div class="container-fluid">*/
/*             <div class="header_texte row">*/
/*                 <div class="col-xs-12 col-sm-12">*/
/*                     <h1>Musée du Louvre</h1>*/
/*                     <p>Bienvenue sur la plateforme de réservation de billets en ligne.</p>*/
/*                     <div class="hidden-xs">*/
/*                         <p>N'attendez plus en caisse et profitez plus rapidement des expositions.</p>*/
/*                     </div>*/
/*                 </div>*/
/*             </div>*/
/*         </div>*/
/*     </div>*/
/* */
/* */
/*     <!-- Premier encart gris : 1.Choisissez la date -->*/
/*     <div class="encart_gris">*/
/*         <div class="container-fluid">*/
/*             <p>1. Choisissez la date</p>*/
/*         </div>*/
/*     </div>*/
/* */
/*     <!-- Datepicker  -->*/
/*     <div class="date_picker">*/
/*         <div class="container row">*/
/*             {{ form_start(formCommande, {'action': path('Louvres_commande_home')}) }}*/
/*             {{ form_errors(formCommande) }}*/
/*             {{ form_widget(formCommande.dateVisite, {'attr': {'id': 'datepicker', 'class': 'col-sm-6 col-md-5 col-lg-4'}}) }}*/
/*         <!--    <div id="datepicker" class="col-sm-6 col-md-5 col-lg-4">*/
/*             </div> -->*/
/*             <div class="legende hidden-xs col-sm-4 col-md-3 col-lg-3">*/
/*                 <div class="row">*/
/*                     <div class="legend_select col-sm-offset-1 col-sm-1">*/
/*                     </div>*/
/*                     <p class="col-sm-9">Date sélectionnée</p>*/
/*                 </div>*/
/* */
/*                 <div class="row">*/
/*                     <div class="legend_ouvert col-sm-offset-1 col-sm-1">*/
/*                     </div>*/
/*                     <p class="col-sm-9">Ouvert</p>*/
/*                 </div>*/
/* */
/*                 <div class="row">*/
/*                     <div class="legend_ferme col-sm-offset-1 col-sm-1">*/
/*                     </div>*/
/*                     <p class="col-sm-9">Fermé</p>*/
/*                 </div>*/
/* */
/*                 <div class="row">*/
/*                     <div class="legend_complet col-sm-offset-1 col-sm-1">*/
/*                     </div>*/
/*                     <p class="col-sm-9">Complet</p>*/
/*                 </div>*/
/*             </div>*/
/*         </div>*/
/*     </div>*/
/* */
/* */
/*     <!-- Deuxième encart gris : 2.Choisissez le type de billets -->*/
/*     <div class="encart_gris">*/
/*         <div class="container-fluid">*/
/*             <p>2. Choisissez le type de billet</p>*/
/*         </div>*/
/*     </div>*/
/* */
/*     <!-- Selection du type de billet-->*/
/*     <div class="type_billet">*/
/*         <div class="container row">*/
/*             <p id="date_selectionnee">*/
/*                 Veuillez d'abord selectionner une date.*/
/*             </p>*/
/*             <!--Forumaire pour le type de billet-->*/
/*             <div id="form_type_billet">*/
/*                 {% for child in formCommande.typeBillet %}*/
/*                     <div class="radio">*/
/*                         {{ form_widget(child, {'attr': {'class': child.vars.label}}) }}*/
/*                         {{ child.vars.label }}*/
/*                     </div>*/
/*                 {% endfor %}*/
/*             </div>*/
/*         </div>*/
/*     </div>*/
/* */
/*     <!-- Troisième encart gris : 3.Choisissez le nombre de billets -->*/
/*  <!--   <div class="encart_gris">*/
/*         <div class="container-fluid">*/
/*             <p>3. Choisissez le nombre de billets</p>*/
/*         </div>*/
/*     </div> -->*/
/* */
/*     <!-- Selection du nombre de billets*/
/*     <div id="nbr_billet">*/
/*         <div class="container row">*/
/*             <div class="form-horizontal tableau_tarifs">*/
/*                 <div class="row form-group">*/
/*                  {#   {{ form_label(formCommande.nbBillet, "Nombre de billets :", {'label_attr': {'class': 'texte_billet col-xs-6 col-sm-3 col-md-2'}}) }}#}*/
/*                   {#  {{ form_errors(formCommande.nbBillet) }}#}*/
/*                     <div class="select col-xs-4 col-sm-3 col-md-2">*/
/*                     {#    {{ form_widget(formCommande.nbBillet, {'attr': {'class': 'form-control input-sm option_nbbillets'}}) }}#}*/
/*                     </div>*/
/*                 </div>*/
/*             </div>*/
/*         </div>*/
/*     </div>-->*/
/* */
/*     <!-- Quatrième encart gris : 4.Renseignez ces informations -->*/
/*     <div class="encart_gris">*/
/*         <div class="container-fluid">*/
/*             <p>3. Choisissez le nombre de billets</p>*/
/*         </div>*/
/*     </div>*/
/* */
/*     <!-- Renseignements des coordonnées-->*/
/*     <div id="info_visiteur">*/
/*         <div class="container">*/
/*             <div id="billet">*/
/*             <!-- Formulaire type pour les billets normal, enfant, réduit, senior et famille --->*/
/*                 <div class="billets" data-prototype="*/
/*                 {% filter escape %}*/
/*                     {{ include('LouvresCommandeBundle:Commande:prototype.html.twig', { 'form': formCommande.billets.vars.prototype }) }}*/
/*                 {% endfilter %}">*/
/*                 </div>*/
/*             </div>*/
/*         </div>*/
/*     </div>*/
/* */
/* */
/* <!-- Cinquième encart gris : 5. Récapitulatif de la commande -->*/
/*     <div class="encart_gris">*/
/*         <div class="container-fluid">*/
/*             <p>4. Récapitulatif de la commande</p>*/
/*         </div>*/
/*     </div>*/
/* */
/*     <!-- Jour de visite + nombre de billets de chaque catégorie + prix total-->*/
/*     <div id="prix_total">*/
/*         <p id="verif">Veuillez saisir tous les champs pour valider la commande</p>*/
/*         <div id="detail_commande">*/
/*             <p>Jour de la visite : <span id="jour_visite"></span><span id="type_billet"></span></p>*/
/*             <p> Nombre de billets : <span id="nombre_billets"></span></p>*/
/*             <div id="details_billets"></div>*/
/*             <p id ="total_commande"><strong>Total de la commande : <span id="prix">0 €</span></strong></p>*/
/*         </div>*/
/*     <!--   <button id="btn-reset" type="submit" class="btn btn-warning btn-sm col-sm-offset-4 col-xs-offset-1">Reset</button> -->*/
/*         {{ form_widget(formCommande.valider, {'attr': {'class': 'btn btn-default btn-sm col-sm-offset-4 col-xs-offset-1', 'id' : 'btn-valider'}}) }}*/
/*     <!--    <button id="btn-valider" type="submit" class="btn btn-default btn-sm col-sm-offset-4 col-xs-offset-1">Valider la commande</button> -->*/
/*         {{ form_rest(formCommande) }}*/
/*         {{ form_end(formCommande) }}*/
/*     </div>*/
/* */
/* {% endblock %}*/
/* */
/* {% block footer %}*/
/* {{ parent() }}*/
/* {% endblock %}*/
/* */
/* {% block javascript %}*/
/* {{ parent() }}*/
/* {% javascripts*/
/* '@LouvresCommandeBundle/Resources/public/js/commande2.js'*/
/* '@LouvresCommandeBundle/Resources/public/js/jquery.flagstrap.min.js' %}*/
/* <script type="text/javascript" src="{{ asset_url }}"></script>*/
/* {% endjavascripts %}*/
/* {% endblock %}*/
/* */
/* */
