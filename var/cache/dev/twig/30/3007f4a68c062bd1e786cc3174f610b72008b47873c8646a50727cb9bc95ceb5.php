<?php

/* LouvresCommandeBundle::layout.html.twig */
class __TwigTemplate_bec70fe121adbbd751b25abc324a01a216ff86139671a35a0ef2b96c1959e324 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'nav' => array($this, 'block_nav'),
            'body' => array($this, 'block_body'),
            'footer' => array($this, 'block_footer'),
            'javascript' => array($this, 'block_javascript'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_d1367b1c4623f483bcca5d2e00b8f20d1bcb39a66c689c2ce7c0c157340f001e = $this->env->getExtension("native_profiler");
        $__internal_d1367b1c4623f483bcca5d2e00b8f20d1bcb39a66c689c2ce7c0c157340f001e->enter($__internal_d1367b1c4623f483bcca5d2e00b8f20d1bcb39a66c689c2ce7c0c157340f001e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "LouvresCommandeBundle::layout.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html lang=\"fr\">

<head>

    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <meta name=\"description\" content=\"\">
    <meta name=\"author\" content=\"\">

    <title>";
        // line 12
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

    ";
        // line 14
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "ba1a5fe_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ba1a5fe_0") : $this->env->getExtension('asset')->getAssetUrl("_controller/css/ba1a5fe_part_1_bootstrap.min_1.css");
            // line 15
            echo "        <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
    ";
            // asset "ba1a5fe_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ba1a5fe_1") : $this->env->getExtension('asset')->getAssetUrl("_controller/css/ba1a5fe_part_1_flags_2.css");
            echo "        <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
    ";
            // asset "ba1a5fe_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ba1a5fe_2") : $this->env->getExtension('asset')->getAssetUrl("_controller/css/ba1a5fe_part_1_flags_3.css");
            echo "        <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
    ";
            // asset "ba1a5fe_3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ba1a5fe_3") : $this->env->getExtension('asset')->getAssetUrl("_controller/css/ba1a5fe_part_1_jquery-ui.min_4.css");
            echo "        <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
    ";
            // asset "ba1a5fe_4"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ba1a5fe_4") : $this->env->getExtension('asset')->getAssetUrl("_controller/css/ba1a5fe_part_1_jquery-ui.structure.min_5.css");
            echo "        <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
    ";
            // asset "ba1a5fe_5"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ba1a5fe_5") : $this->env->getExtension('asset')->getAssetUrl("_controller/css/ba1a5fe_part_1_jquery-ui.theme.min_6.css");
            echo "        <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
    ";
            // asset "ba1a5fe_6"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ba1a5fe_6") : $this->env->getExtension('asset')->getAssetUrl("_controller/css/ba1a5fe_part_1_style_7.css");
            echo "        <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
    ";
        } else {
            // asset "ba1a5fe"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ba1a5fe") : $this->env->getExtension('asset')->getAssetUrl("_controller/css/ba1a5fe.css");
            echo "        <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
    ";
        }
        unset($context["asset_url"]);
        // line 17
        echo "
    <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />

</head>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js\"></script>
<script src=\"https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js\"></script>
<![endif]-->

</head>

<body>
";
        // line 32
        $this->displayBlock('nav', $context, $blocks);
        // line 62
        echo "
";
        // line 63
        $this->displayBlock('body', $context, $blocks);
        // line 65
        echo "
<!-- Pied de page  -->
";
        // line 67
        $this->displayBlock('footer', $context, $blocks);
        // line 90
        echo "
";
        // line 91
        $this->displayBlock('javascript', $context, $blocks);
        // line 99
        echo "
</body>

</html>";
        
        $__internal_d1367b1c4623f483bcca5d2e00b8f20d1bcb39a66c689c2ce7c0c157340f001e->leave($__internal_d1367b1c4623f483bcca5d2e00b8f20d1bcb39a66c689c2ce7c0c157340f001e_prof);

    }

    // line 12
    public function block_title($context, array $blocks = array())
    {
        $__internal_7dae93eeb7b1609b1399c1b6aa5b4006938158c181669eef66e3752c36d3233c = $this->env->getExtension("native_profiler");
        $__internal_7dae93eeb7b1609b1399c1b6aa5b4006938158c181669eef66e3752c36d3233c->enter($__internal_7dae93eeb7b1609b1399c1b6aa5b4006938158c181669eef66e3752c36d3233c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        
        $__internal_7dae93eeb7b1609b1399c1b6aa5b4006938158c181669eef66e3752c36d3233c->leave($__internal_7dae93eeb7b1609b1399c1b6aa5b4006938158c181669eef66e3752c36d3233c_prof);

    }

    // line 32
    public function block_nav($context, array $blocks = array())
    {
        $__internal_dd57c63b296a60cdf326bcf1f5a3b959ddcb2fe4789cb0470203aa9bef620594 = $this->env->getExtension("native_profiler");
        $__internal_dd57c63b296a60cdf326bcf1f5a3b959ddcb2fe4789cb0470203aa9bef620594->enter($__internal_dd57c63b296a60cdf326bcf1f5a3b959ddcb2fe4789cb0470203aa9bef620594_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "nav"));

        // line 33
        echo "<!-- Navigation -->
    <nav class=\"navbar navbar-default\">
        <div class=\"container-fluid\">
            <div class=\"navbar-header\">
                <span class=\"navbar-brand hidden-sm hidden-md hidden-lg\">Billeterie</span>
            </div>

            <div class=\"collapse navbar-collapse logo\">
                <div class=\"col-sm-4\">
                    ";
        // line 42
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "0a109d1_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0a109d1_0") : $this->env->getExtension('asset')->getAssetUrl("_controller/images/0a109d1_logo_louvre_1.png");
            // line 43
            echo "                    <img src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" alt=\"Logo du Louvres\" />
                    ";
        } else {
            // asset "0a109d1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_0a109d1") : $this->env->getExtension('asset')->getAssetUrl("_controller/images/0a109d1.png");
            echo "                    <img src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" alt=\"Logo du Louvres\" />
                    ";
        }
        unset($context["asset_url"]);
        // line 45
        echo "                </div>
                <div class=\"col-sm-8\">
                    <h1>Billeterie</h1>
                </div>
            </div>
        </div>
    </nav>

    <!-- Bandeau rouge -->
    <div class=\"bandeau_rouge\">
        <div class=\"container-fluid\">
            ";
        // line 56
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "27e4fa2_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_27e4fa2_0") : $this->env->getExtension('asset')->getAssetUrl("_controller/images/27e4fa2_home_crumb_1.png");
            // line 57
            echo "            <img src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" alt=\"Pyramide\" />
            ";
        } else {
            // asset "27e4fa2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_27e4fa2") : $this->env->getExtension('asset')->getAssetUrl("_controller/images/27e4fa2.png");
            echo "            <img src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" alt=\"Pyramide\" />
            ";
        }
        unset($context["asset_url"]);
        // line 59
        echo "        </div>
    </div>
";
        
        $__internal_dd57c63b296a60cdf326bcf1f5a3b959ddcb2fe4789cb0470203aa9bef620594->leave($__internal_dd57c63b296a60cdf326bcf1f5a3b959ddcb2fe4789cb0470203aa9bef620594_prof);

    }

    // line 63
    public function block_body($context, array $blocks = array())
    {
        $__internal_cd217e555d93367ca4698c8fa2e9541c7556f46aa226f970bb78cd56e942006c = $this->env->getExtension("native_profiler");
        $__internal_cd217e555d93367ca4698c8fa2e9541c7556f46aa226f970bb78cd56e942006c->enter($__internal_cd217e555d93367ca4698c8fa2e9541c7556f46aa226f970bb78cd56e942006c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_cd217e555d93367ca4698c8fa2e9541c7556f46aa226f970bb78cd56e942006c->leave($__internal_cd217e555d93367ca4698c8fa2e9541c7556f46aa226f970bb78cd56e942006c_prof);

    }

    // line 67
    public function block_footer($context, array $blocks = array())
    {
        $__internal_2defcdb857ee81993edfa5d8d399a75750736f39766f50acf2e6e4cff77aa0c3 = $this->env->getExtension("native_profiler");
        $__internal_2defcdb857ee81993edfa5d8d399a75750736f39766f50acf2e6e4cff77aa0c3->enter($__internal_2defcdb857ee81993edfa5d8d399a75750736f39766f50acf2e6e4cff77aa0c3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "footer"));

        // line 68
        echo "    <footer>
        <div id=\"payments\">
            <span>Paiement 100% sécurisé</span>
            ";
        // line 71
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "6c06257_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_6c06257_0") : $this->env->getExtension('asset')->getAssetUrl("_controller/images/6c06257_mastercard_1.gif");
            // line 72
            echo "            <img src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" alt=\"master\" width=60 height=30/>
            ";
        } else {
            // asset "6c06257"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_6c06257") : $this->env->getExtension('asset')->getAssetUrl("_controller/images/6c06257.gif");
            echo "            <img src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" alt=\"master\" width=60 height=30/>
            ";
        }
        unset($context["asset_url"]);
        // line 74
        echo "            ";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "f0113c6_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_f0113c6_0") : $this->env->getExtension('asset')->getAssetUrl("_controller/images/f0113c6_visa_1.gif");
            // line 75
            echo "            <img src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" alt=\"visa\" width=50 height=20/>
            ";
        } else {
            // asset "f0113c6"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_f0113c6") : $this->env->getExtension('asset')->getAssetUrl("_controller/images/f0113c6.gif");
            echo "            <img src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" alt=\"visa\" width=50 height=20/>
            ";
        }
        unset($context["asset_url"]);
        // line 77
        echo "            ";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "e3ad842_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_e3ad842_0") : $this->env->getExtension('asset')->getAssetUrl("_controller/images/e3ad842_e.bleue_1.png");
            // line 78
            echo "            <img src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" alt=\"e.BLEUE\" width=50 height=20/>
            ";
        } else {
            // asset "e3ad842"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_e3ad842") : $this->env->getExtension('asset')->getAssetUrl("_controller/images/e3ad842.png");
            echo "            <img src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" alt=\"e.BLEUE\" width=50 height=20/>
            ";
        }
        unset($context["asset_url"]);
        // line 80
        echo "        </div>
        <div id=\"mentions\">
            <a class=\"col-sm-3\" href=\"#\">Tarifs</a>
            <a class=\"col-sm-3\" href=\"#\">Contactez-nous</a>
            <a class=\"col-sm-3\" href=\"#\">CGV</a>
            <a class=\"col-sm-3\" href=\"#\">Aide/FAQ</a>
        </div>
    </footer>

";
        
        $__internal_2defcdb857ee81993edfa5d8d399a75750736f39766f50acf2e6e4cff77aa0c3->leave($__internal_2defcdb857ee81993edfa5d8d399a75750736f39766f50acf2e6e4cff77aa0c3_prof);

    }

    // line 91
    public function block_javascript($context, array $blocks = array())
    {
        $__internal_0f0237738e9f0233c341c01879c3d1f79f118b022775a2e1476a5eda39db7f27 = $this->env->getExtension("native_profiler");
        $__internal_0f0237738e9f0233c341c01879c3d1f79f118b022775a2e1476a5eda39db7f27->enter($__internal_0f0237738e9f0233c341c01879c3d1f79f118b022775a2e1476a5eda39db7f27_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascript"));

        // line 92
        echo "    ";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "810bd91_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_810bd91_0") : $this->env->getExtension('asset')->getAssetUrl("_controller/js/810bd91_jquery.min_1.js");
            // line 96
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "810bd91_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_810bd91_1") : $this->env->getExtension('asset')->getAssetUrl("_controller/js/810bd91_jquery-ui.min_2.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "810bd91_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_810bd91_2") : $this->env->getExtension('asset')->getAssetUrl("_controller/js/810bd91_bootstrap.min_3.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "810bd91"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_810bd91") : $this->env->getExtension('asset')->getAssetUrl("_controller/js/810bd91.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        }
        unset($context["asset_url"]);
        
        $__internal_0f0237738e9f0233c341c01879c3d1f79f118b022775a2e1476a5eda39db7f27->leave($__internal_0f0237738e9f0233c341c01879c3d1f79f118b022775a2e1476a5eda39db7f27_prof);

    }

    public function getTemplateName()
    {
        return "LouvresCommandeBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  338 => 96,  333 => 92,  327 => 91,  311 => 80,  297 => 78,  292 => 77,  278 => 75,  273 => 74,  259 => 72,  255 => 71,  250 => 68,  244 => 67,  233 => 63,  224 => 59,  210 => 57,  206 => 56,  193 => 45,  179 => 43,  175 => 42,  164 => 33,  158 => 32,  147 => 12,  137 => 99,  135 => 91,  132 => 90,  130 => 67,  126 => 65,  124 => 63,  121 => 62,  119 => 32,  102 => 18,  99 => 17,  49 => 15,  45 => 14,  40 => 12,  27 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html lang="fr">*/
/* */
/* <head>*/
/* */
/*     <meta charset="utf-8">*/
/*     <meta http-equiv="X-UA-Compatible" content="IE=edge">*/
/*     <meta name="viewport" content="width=device-width, initial-scale=1">*/
/*     <meta name="description" content="">*/
/*     <meta name="author" content="">*/
/* */
/*     <title>{% block title %}{% endblock %}</title>*/
/* */
/*     {% stylesheets 'bundles/louvrescommande/css/*'  filter='cssrewrite' %}*/
/*         <link rel="stylesheet" href="{{ asset_url }}" />*/
/*     {% endstylesheets %}*/
/* */
/*     <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />*/
/* */
/* </head>*/
/* */
/* <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->*/
/* <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->*/
/* <!--[if lt IE 9]>*/
/* <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>*/
/* <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>*/
/* <![endif]-->*/
/* */
/* </head>*/
/* */
/* <body>*/
/* {% block nav %}*/
/* <!-- Navigation -->*/
/*     <nav class="navbar navbar-default">*/
/*         <div class="container-fluid">*/
/*             <div class="navbar-header">*/
/*                 <span class="navbar-brand hidden-sm hidden-md hidden-lg">Billeterie</span>*/
/*             </div>*/
/* */
/*             <div class="collapse navbar-collapse logo">*/
/*                 <div class="col-sm-4">*/
/*                     {% image '@LouvresCommandeBundle/Resources/public/images/logo_louvre.png' %}*/
/*                     <img src="{{ asset_url }}" alt="Logo du Louvres" />*/
/*                     {% endimage %}*/
/*                 </div>*/
/*                 <div class="col-sm-8">*/
/*                     <h1>Billeterie</h1>*/
/*                 </div>*/
/*             </div>*/
/*         </div>*/
/*     </nav>*/
/* */
/*     <!-- Bandeau rouge -->*/
/*     <div class="bandeau_rouge">*/
/*         <div class="container-fluid">*/
/*             {% image '@LouvresCommandeBundle/Resources/public/images/home_crumb.png' %}*/
/*             <img src="{{ asset_url }}" alt="Pyramide" />*/
/*             {% endimage %}*/
/*         </div>*/
/*     </div>*/
/* {% endblock %}*/
/* */
/* {% block body %}*/
/* {% endblock %}*/
/* */
/* <!-- Pied de page  -->*/
/* {% block footer %}*/
/*     <footer>*/
/*         <div id="payments">*/
/*             <span>Paiement 100% sécurisé</span>*/
/*             {% image '@LouvresCommandeBundle/Resources/public/images/mastercard.gif' %}*/
/*             <img src="{{ asset_url }}" alt="master" width=60 height=30/>*/
/*             {% endimage %}*/
/*             {% image '@LouvresCommandeBundle/Resources/public/images/visa.gif' %}*/
/*             <img src="{{ asset_url }}" alt="visa" width=50 height=20/>*/
/*             {% endimage %}*/
/*             {% image '@LouvresCommandeBundle/Resources/public/images/e.bleue.png' %}*/
/*             <img src="{{ asset_url }}" alt="e.BLEUE" width=50 height=20/>*/
/*             {% endimage %}*/
/*         </div>*/
/*         <div id="mentions">*/
/*             <a class="col-sm-3" href="#">Tarifs</a>*/
/*             <a class="col-sm-3" href="#">Contactez-nous</a>*/
/*             <a class="col-sm-3" href="#">CGV</a>*/
/*             <a class="col-sm-3" href="#">Aide/FAQ</a>*/
/*         </div>*/
/*     </footer>*/
/* */
/* {% endblock %}*/
/* */
/* {% block javascript %}*/
/*     {% javascripts*/
/*         '@LouvresCommandeBundle/Resources/public/js/jquery.min.js'*/
/*         '@LouvresCommandeBundle/Resources/public/js/jquery-ui.min.js'*/
/*         '@LouvresCommandeBundle/Resources/public/js/bootstrap.min.js' %}*/
/*     <script type="text/javascript" src="{{ asset_url }}"></script>*/
/*     {% endjavascripts %}*/
/* {% endblock %}*/
/* */
/* </body>*/
/* */
/* </html>*/
