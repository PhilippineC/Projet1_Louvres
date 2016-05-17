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
        $__internal_7fda56a3b982f35557b91334dbc8992d466f634b86ce5daf5e3307b72f36d43c = $this->env->getExtension("native_profiler");
        $__internal_7fda56a3b982f35557b91334dbc8992d466f634b86ce5daf5e3307b72f36d43c->enter($__internal_7fda56a3b982f35557b91334dbc8992d466f634b86ce5daf5e3307b72f36d43c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "LouvresCommandeBundle:Commande:index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_7fda56a3b982f35557b91334dbc8992d466f634b86ce5daf5e3307b72f36d43c->leave($__internal_7fda56a3b982f35557b91334dbc8992d466f634b86ce5daf5e3307b72f36d43c_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_636e02d5c1e927eb8091bebe7175325943ddf52de79482dbc4b38379e9ec4bc0 = $this->env->getExtension("native_profiler");
        $__internal_636e02d5c1e927eb8091bebe7175325943ddf52de79482dbc4b38379e9ec4bc0->enter($__internal_636e02d5c1e927eb8091bebe7175325943ddf52de79482dbc4b38379e9ec4bc0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 4
        echo "    Billetterie - Musée du Louvres
";
        
        $__internal_636e02d5c1e927eb8091bebe7175325943ddf52de79482dbc4b38379e9ec4bc0->leave($__internal_636e02d5c1e927eb8091bebe7175325943ddf52de79482dbc4b38379e9ec4bc0_prof);

    }

    // line 7
    public function block_nav($context, array $blocks = array())
    {
        $__internal_99e4be5f64f5533cbd75d995b53df058d65bd479b336f5f1f4d4bea9cfc2bda1 = $this->env->getExtension("native_profiler");
        $__internal_99e4be5f64f5533cbd75d995b53df058d65bd479b336f5f1f4d4bea9cfc2bda1->enter($__internal_99e4be5f64f5533cbd75d995b53df058d65bd479b336f5f1f4d4bea9cfc2bda1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "nav"));

        // line 8
        echo "    ";
        $this->displayParentBlock("nav", $context, $blocks);
        echo "
";
        
        $__internal_99e4be5f64f5533cbd75d995b53df058d65bd479b336f5f1f4d4bea9cfc2bda1->leave($__internal_99e4be5f64f5533cbd75d995b53df058d65bd479b336f5f1f4d4bea9cfc2bda1_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_49e7338fd05855c7087a0e20313efa4780eb49cacf1f4044e41dc17234dadf95 = $this->env->getExtension("native_profiler");
        $__internal_49e7338fd05855c7087a0e20313efa4780eb49cacf1f4044e41dc17234dadf95->enter($__internal_49e7338fd05855c7087a0e20313efa4780eb49cacf1f4044e41dc17234dadf95_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

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
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["formCommande"]) ? $context["formCommande"] : $this->getContext($context, "formCommande")), 'form_start');
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
    <div class=\"encart_gris\">
        <div class=\"container-fluid\">
            <p>3. Choisissez le nombre de billets</p>
        </div>
    </div>

    <!-- Selection du nombre de billets-->
    <div id=\"nbr_billet\">
        <div class=\"container row\">
            <div class=\"form-horizontal tableau_tarifs\">
                <div class=\"row form-group\">
                    ";
        // line 109
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formCommande"]) ? $context["formCommande"] : $this->getContext($context, "formCommande")), "nbBillet", array()), 'label', array("label_attr" => array("class" => "texte_billet col-xs-6 col-sm-3 col-md-2"), "label" => "Nombre de billets :"));
        echo "
                    ";
        // line 110
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formCommande"]) ? $context["formCommande"] : $this->getContext($context, "formCommande")), "nbBillet", array()), 'errors');
        echo "
                    <div class=\"select col-xs-4 col-sm-3 col-md-2\">
                        ";
        // line 112
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formCommande"]) ? $context["formCommande"] : $this->getContext($context, "formCommande")), "nbBillet", array()), 'widget', array("attr" => array("class" => "form-control input-sm option_nbbillets")));
        echo "
                    </div>
                </div>
                ";
        // line 115
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["formCommande"]) ? $context["formCommande"] : $this->getContext($context, "formCommande")), 'form_end');
        echo "
            </div>
        </div>
    </div>

    <!-- Quatrième encart gris : 4.Renseignez ces informations -->
    <div class=\"encart_gris\">
        <div class=\"container-fluid\">
            <p>4. Renseignez ces informations</p>
        </div>
    </div>

    <!-- Renseignements des coordonnées-->
    <div id=\"info_visiteur\">

        <div class=\"container\">
            <div id=\"billet\"></div>

            <!-- Formulaire type pour les billets normal, enfant, réduit, senior et famille --->
            ";
        // line 134
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["formBillet"]) ? $context["formBillet"] : $this->getContext($context, "formBillet")), 'form_start', array("attr" => array("id" => "formulaire_a_copier", "class" => "form-horizontal")));
        echo "
            ";
        // line 135
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["formBillet"]) ? $context["formBillet"] : $this->getContext($context, "formBillet")), 'errors');
        echo "
          <!--  <form class=\"form-horizontal row\" id=\"formulaire_a_copier\"> -->
                <fieldset>
                    <legend></legend>

                    <div class=\"row champs\">
                        <div class=\"form-group input_form col-xs-12 col-sm-3\">
                            ";
        // line 142
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formBillet"]) ? $context["formBillet"] : $this->getContext($context, "formBillet")), "nom", array()), 'widget', array("attr" => array("class" => "form-control input-sm")));
        echo "
                         <!--   <input name=\"nom\" id=\"nom\" placeholder=\"Nom\" class=\"form-control input-sm\" type=\"text\" required> -->
                            <span class=\"error\">Saisir au moins 2 caractères</span>
                        </div>
                        <div class=\"form-group input_form col-xs-12 col-sm-3\">
                            ";
        // line 147
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formBillet"]) ? $context["formBillet"] : $this->getContext($context, "formBillet")), "prenom", array()), 'widget', array("attr" => array("class" => "form-control input-sm")));
        echo "
                            <span class=\"error\">Saisir au moins 2 caractères</span>
                        </div>

                        <div class=\"form-group input_form col-xs-12 col-sm-3\">
                            ";
        // line 152
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formBillet"]) ? $context["formBillet"] : $this->getContext($context, "formBillet")), "dateNaissance", array()), 'widget', array("attr" => array("class" => "form-control input-sm")));
        echo "
                        <!--    <input name=\"date_naissance\" id=\"date_naissance\" placeholder=\"Date de naissance\" class=\"form-control input-sm\" type=\"text\"> -->
                            <span class=\"help-block\">Format attendu : XX/XX/XXXX</span>
                            <span class=\"error\">Date invalide</span>
                        </div>
                        <div class=\"col-xs-12 col-sm-3\">
                            ";
        // line 158
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formBillet"]) ? $context["formBillet"] : $this->getContext($context, "formBillet")), "pays", array()), 'widget');
        echo "
                            <!--    <div class=\"pays\">
                            </div>-->
                        </div>
                    </div>
                    <div class=\"row reduit\">
                        <label class=\"checkbox-inline\">
                            ";
        // line 165
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formBillet"]) ? $context["formBillet"] : $this->getContext($context, "formBillet")), "reduit", array()), 'widget');
        echo "
                            ";
        // line 166
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formBillet"]) ? $context["formBillet"] : $this->getContext($context, "formBillet")), "reduit", array()), 'label');
        echo "
                     <!--       <input type=\"checkbox\" id=\"reduit\" value=\"tarif_reduit\">Tarif réduit <em>(étudiant, employé du musée, d’un service du Ministère de la Culture, militaire…)</em> -->
                        </label>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>

    <!-- Cinquième encart gris : 5. Récapitulatif de la commande -->
    <div class=\"encart_gris\">
        <div class=\"container-fluid\">
            <p>5. Récapitulatif de la commande</p>
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
        <button id=\"btn-valider\" type=\"submit\" class=\"btn btn-default btn-sm col-sm-offset-4 col-xs-offset-1\">Valider la commande</button>
    </div>

";
        
        $__internal_49e7338fd05855c7087a0e20313efa4780eb49cacf1f4044e41dc17234dadf95->leave($__internal_49e7338fd05855c7087a0e20313efa4780eb49cacf1f4044e41dc17234dadf95_prof);

    }

    // line 197
    public function block_footer($context, array $blocks = array())
    {
        $__internal_316943f3aefcba497cfaa76fb3bbfce3bc859a2ef5c8adbbd3aa867e5a07a3b8 = $this->env->getExtension("native_profiler");
        $__internal_316943f3aefcba497cfaa76fb3bbfce3bc859a2ef5c8adbbd3aa867e5a07a3b8->enter($__internal_316943f3aefcba497cfaa76fb3bbfce3bc859a2ef5c8adbbd3aa867e5a07a3b8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "footer"));

        // line 198
        echo "    ";
        $this->displayParentBlock("footer", $context, $blocks);
        echo "
";
        
        $__internal_316943f3aefcba497cfaa76fb3bbfce3bc859a2ef5c8adbbd3aa867e5a07a3b8->leave($__internal_316943f3aefcba497cfaa76fb3bbfce3bc859a2ef5c8adbbd3aa867e5a07a3b8_prof);

    }

    // line 201
    public function block_javascript($context, array $blocks = array())
    {
        $__internal_4a7ec38e3f3b915d948f9d743f1f1151f5bc97891804cf5e5e9a6b1dc9a15b39 = $this->env->getExtension("native_profiler");
        $__internal_4a7ec38e3f3b915d948f9d743f1f1151f5bc97891804cf5e5e9a6b1dc9a15b39->enter($__internal_4a7ec38e3f3b915d948f9d743f1f1151f5bc97891804cf5e5e9a6b1dc9a15b39_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascript"));

        // line 202
        echo "    ";
        $this->displayParentBlock("javascript", $context, $blocks);
        echo "
    ";
        // line 203
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "4dc3873_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_4dc3873_0") : $this->env->getExtension('asset')->getAssetUrl("_controller/js/4dc3873_jquery.flagstrap.min_1.js");
            // line 206
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "4dc3873_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_4dc3873_1") : $this->env->getExtension('asset')->getAssetUrl("_controller/js/4dc3873_commande_2.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "4dc3873"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_4dc3873") : $this->env->getExtension('asset')->getAssetUrl("_controller/js/4dc3873.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        }
        unset($context["asset_url"]);
        
        $__internal_4a7ec38e3f3b915d948f9d743f1f1151f5bc97891804cf5e5e9a6b1dc9a15b39->leave($__internal_4a7ec38e3f3b915d948f9d743f1f1151f5bc97891804cf5e5e9a6b1dc9a15b39_prof);

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
        return array (  356 => 206,  352 => 203,  347 => 202,  341 => 201,  331 => 198,  325 => 197,  288 => 166,  284 => 165,  274 => 158,  265 => 152,  257 => 147,  249 => 142,  239 => 135,  235 => 134,  213 => 115,  207 => 112,  202 => 110,  198 => 109,  180 => 93,  171 => 90,  167 => 89,  164 => 88,  160 => 87,  110 => 40,  106 => 39,  102 => 38,  74 => 12,  68 => 11,  58 => 8,  52 => 7,  44 => 4,  38 => 3,  11 => 1,);
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
/*             {{ form_start(formCommande) }}*/
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
/*     <div class="encart_gris">*/
/*         <div class="container-fluid">*/
/*             <p>3. Choisissez le nombre de billets</p>*/
/*         </div>*/
/*     </div>*/
/* */
/*     <!-- Selection du nombre de billets-->*/
/*     <div id="nbr_billet">*/
/*         <div class="container row">*/
/*             <div class="form-horizontal tableau_tarifs">*/
/*                 <div class="row form-group">*/
/*                     {{ form_label(formCommande.nbBillet, "Nombre de billets :", {'label_attr': {'class': 'texte_billet col-xs-6 col-sm-3 col-md-2'}}) }}*/
/*                     {{ form_errors(formCommande.nbBillet) }}*/
/*                     <div class="select col-xs-4 col-sm-3 col-md-2">*/
/*                         {{ form_widget(formCommande.nbBillet, {'attr': {'class': 'form-control input-sm option_nbbillets'}}) }}*/
/*                     </div>*/
/*                 </div>*/
/*                 {{ form_end(formCommande) }}*/
/*             </div>*/
/*         </div>*/
/*     </div>*/
/* */
/*     <!-- Quatrième encart gris : 4.Renseignez ces informations -->*/
/*     <div class="encart_gris">*/
/*         <div class="container-fluid">*/
/*             <p>4. Renseignez ces informations</p>*/
/*         </div>*/
/*     </div>*/
/* */
/*     <!-- Renseignements des coordonnées-->*/
/*     <div id="info_visiteur">*/
/* */
/*         <div class="container">*/
/*             <div id="billet"></div>*/
/* */
/*             <!-- Formulaire type pour les billets normal, enfant, réduit, senior et famille --->*/
/*             {{ form_start(formBillet, {'attr': {'id': 'formulaire_a_copier', 'class': 'form-horizontal'}}) }}*/
/*             {{ form_errors(formBillet) }}*/
/*           <!--  <form class="form-horizontal row" id="formulaire_a_copier"> -->*/
/*                 <fieldset>*/
/*                     <legend></legend>*/
/* */
/*                     <div class="row champs">*/
/*                         <div class="form-group input_form col-xs-12 col-sm-3">*/
/*                             {{ form_widget(formBillet.nom, {'attr': {'class': 'form-control input-sm'}}) }}*/
/*                          <!--   <input name="nom" id="nom" placeholder="Nom" class="form-control input-sm" type="text" required> -->*/
/*                             <span class="error">Saisir au moins 2 caractères</span>*/
/*                         </div>*/
/*                         <div class="form-group input_form col-xs-12 col-sm-3">*/
/*                             {{ form_widget(formBillet.prenom, {'attr': {'class': 'form-control input-sm'}}) }}*/
/*                             <span class="error">Saisir au moins 2 caractères</span>*/
/*                         </div>*/
/* */
/*                         <div class="form-group input_form col-xs-12 col-sm-3">*/
/*                             {{ form_widget(formBillet.dateNaissance, {'attr': {'class': 'form-control input-sm'}}) }}*/
/*                         <!--    <input name="date_naissance" id="date_naissance" placeholder="Date de naissance" class="form-control input-sm" type="text"> -->*/
/*                             <span class="help-block">Format attendu : XX/XX/XXXX</span>*/
/*                             <span class="error">Date invalide</span>*/
/*                         </div>*/
/*                         <div class="col-xs-12 col-sm-3">*/
/*                             {{ form_widget(formBillet.pays ) }}*/
/*                             <!--    <div class="pays">*/
/*                             </div>-->*/
/*                         </div>*/
/*                     </div>*/
/*                     <div class="row reduit">*/
/*                         <label class="checkbox-inline">*/
/*                             {{ form_widget(formBillet.reduit) }}*/
/*                             {{ form_label(formBillet.reduit) }}*/
/*                      <!--       <input type="checkbox" id="reduit" value="tarif_reduit">Tarif réduit <em>(étudiant, employé du musée, d’un service du Ministère de la Culture, militaire…)</em> -->*/
/*                         </label>*/
/*                     </div>*/
/*                 </fieldset>*/
/*             </form>*/
/*         </div>*/
/*     </div>*/
/* */
/*     <!-- Cinquième encart gris : 5. Récapitulatif de la commande -->*/
/*     <div class="encart_gris">*/
/*         <div class="container-fluid">*/
/*             <p>5. Récapitulatif de la commande</p>*/
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
/*         <!--   <button id="btn-reset" type="submit" class="btn btn-warning btn-sm col-sm-offset-4 col-xs-offset-1">Reset</button> -->*/
/*         <button id="btn-valider" type="submit" class="btn btn-default btn-sm col-sm-offset-4 col-xs-offset-1">Valider la commande</button>*/
/*     </div>*/
/* */
/* {% endblock %}*/
/* */
/* {% block footer %}*/
/*     {{ parent() }}*/
/* {% endblock %}*/
/* */
/* {% block javascript %}*/
/*     {{ parent() }}*/
/*     {% javascripts*/
/*     '@LouvresCommandeBundle/Resources/public/js/jquery.flagstrap.min.js'*/
/*     '@LouvresCommandeBundle/Resources/public/js/commande.js' %}*/
/*     <script type="text/javascript" src="{{ asset_url }}"></script>*/
/*     {% endjavascripts %}*/
/* {% endblock %}*/
/* */
/* */
