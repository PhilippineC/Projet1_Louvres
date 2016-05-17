<?php

/* @Twig/Exception/exception_full.html.twig */
class __TwigTemplate_321487bc77051344b42398168579b8600c32dbf86b9e029ad986bf09e809587f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@Twig/layout.html.twig", "@Twig/Exception/exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Twig/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_b9032b8dbee7e0dd0deaf4b755e8cd569e632727b6377d4333738630db17837c = $this->env->getExtension("native_profiler");
        $__internal_b9032b8dbee7e0dd0deaf4b755e8cd569e632727b6377d4333738630db17837c->enter($__internal_b9032b8dbee7e0dd0deaf4b755e8cd569e632727b6377d4333738630db17837c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_b9032b8dbee7e0dd0deaf4b755e8cd569e632727b6377d4333738630db17837c->leave($__internal_b9032b8dbee7e0dd0deaf4b755e8cd569e632727b6377d4333738630db17837c_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_6ce2d1086e67fbf537692ca4e8650b658fb9b30a2be0a4d31668d4ac910f0b6a = $this->env->getExtension("native_profiler");
        $__internal_6ce2d1086e67fbf537692ca4e8650b658fb9b30a2be0a4d31668d4ac910f0b6a->enter($__internal_6ce2d1086e67fbf537692ca4e8650b658fb9b30a2be0a4d31668d4ac910f0b6a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_6ce2d1086e67fbf537692ca4e8650b658fb9b30a2be0a4d31668d4ac910f0b6a->leave($__internal_6ce2d1086e67fbf537692ca4e8650b658fb9b30a2be0a4d31668d4ac910f0b6a_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_d8a16858dec33e5e03171c6a856ac2dc78073c99c3d4aa3729200eb4d55a2f3d = $this->env->getExtension("native_profiler");
        $__internal_d8a16858dec33e5e03171c6a856ac2dc78073c99c3d4aa3729200eb4d55a2f3d->enter($__internal_d8a16858dec33e5e03171c6a856ac2dc78073c99c3d4aa3729200eb4d55a2f3d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_d8a16858dec33e5e03171c6a856ac2dc78073c99c3d4aa3729200eb4d55a2f3d->leave($__internal_d8a16858dec33e5e03171c6a856ac2dc78073c99c3d4aa3729200eb4d55a2f3d_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_99aed065e109fd422922888776d987d9658ce9dc12dda65016654e5c5bf6f902 = $this->env->getExtension("native_profiler");
        $__internal_99aed065e109fd422922888776d987d9658ce9dc12dda65016654e5c5bf6f902->enter($__internal_99aed065e109fd422922888776d987d9658ce9dc12dda65016654e5c5bf6f902_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_99aed065e109fd422922888776d987d9658ce9dc12dda65016654e5c5bf6f902->leave($__internal_99aed065e109fd422922888776d987d9658ce9dc12dda65016654e5c5bf6f902_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 12,  72 => 11,  58 => 8,  52 => 7,  42 => 4,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@Twig/layout.html.twig' %}*/
/* */
/* {% block head %}*/
/*     <link href="{{ absolute_url(asset('bundles/framework/css/exception.css')) }}" rel="stylesheet" type="text/css" media="all" />*/
/* {% endblock %}*/
/* */
/* {% block title %}*/
/*     {{ exception.message }} ({{ status_code }} {{ status_text }})*/
/* {% endblock %}*/
/* */
/* {% block body %}*/
/*     {% include '@Twig/Exception/exception.html.twig' %}*/
/* {% endblock %}*/
/* */
