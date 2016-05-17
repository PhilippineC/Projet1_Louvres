<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_c73f828708ba7e4d770da77d56f183d9c23ad5069723e8996914172ddd785703 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/router.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_fe2a27f85fdaa1cde5931b0ab69749b264569642768a78d0579bd77afc3c43eb = $this->env->getExtension("native_profiler");
        $__internal_fe2a27f85fdaa1cde5931b0ab69749b264569642768a78d0579bd77afc3c43eb->enter($__internal_fe2a27f85fdaa1cde5931b0ab69749b264569642768a78d0579bd77afc3c43eb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_fe2a27f85fdaa1cde5931b0ab69749b264569642768a78d0579bd77afc3c43eb->leave($__internal_fe2a27f85fdaa1cde5931b0ab69749b264569642768a78d0579bd77afc3c43eb_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_db90fc9ee02b4019c635de87318b233e35b1b81c5791ebca6639ea1b802a72fd = $this->env->getExtension("native_profiler");
        $__internal_db90fc9ee02b4019c635de87318b233e35b1b81c5791ebca6639ea1b802a72fd->enter($__internal_db90fc9ee02b4019c635de87318b233e35b1b81c5791ebca6639ea1b802a72fd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_db90fc9ee02b4019c635de87318b233e35b1b81c5791ebca6639ea1b802a72fd->leave($__internal_db90fc9ee02b4019c635de87318b233e35b1b81c5791ebca6639ea1b802a72fd_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_22ad347faaeb101eb208ea08fa73aa528d9a8360ebb7b8102d4836220d0fbdfe = $this->env->getExtension("native_profiler");
        $__internal_22ad347faaeb101eb208ea08fa73aa528d9a8360ebb7b8102d4836220d0fbdfe->enter($__internal_22ad347faaeb101eb208ea08fa73aa528d9a8360ebb7b8102d4836220d0fbdfe_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_22ad347faaeb101eb208ea08fa73aa528d9a8360ebb7b8102d4836220d0fbdfe->leave($__internal_22ad347faaeb101eb208ea08fa73aa528d9a8360ebb7b8102d4836220d0fbdfe_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_e2204e9b006e37ec3c90e5f30fb0f95330b0d7930e250f09effeeda4aba4f2f5 = $this->env->getExtension("native_profiler");
        $__internal_e2204e9b006e37ec3c90e5f30fb0f95330b0d7930e250f09effeeda4aba4f2f5->enter($__internal_e2204e9b006e37ec3c90e5f30fb0f95330b0d7930e250f09effeeda4aba4f2f5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_e2204e9b006e37ec3c90e5f30fb0f95330b0d7930e250f09effeeda4aba4f2f5->leave($__internal_e2204e9b006e37ec3c90e5f30fb0f95330b0d7930e250f09effeeda4aba4f2f5_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/router.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 13,  67 => 12,  56 => 7,  53 => 6,  47 => 5,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@WebProfiler/Profiler/layout.html.twig' %}*/
/* */
/* {% block toolbar %}{% endblock %}*/
/* */
/* {% block menu %}*/
/* <span class="label">*/
/*     <span class="icon">{{ include('@WebProfiler/Icon/router.svg') }}</span>*/
/*     <strong>Routing</strong>*/
/* </span>*/
/* {% endblock %}*/
/* */
/* {% block panel %}*/
/*     {{ render(path('_profiler_router', { token: token })) }}*/
/* {% endblock %}*/
/* */
