<?php

/* AcmeTestBundle:Default:index.html.twig */
class __TwigTemplate_c76f4fb5988863fe168e1002e8689b0902aa43971e3af49fb26f605ff0274c56 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<html>
    <head><strong>welcome ";
        // line 2
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
        echo "</strong></head>
    <br/>
    
Hello ";
        // line 5
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
        echo "!
</html>";
    }

    public function getTemplateName()
    {
        return "AcmeTestBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  28 => 5,  22 => 2,  19 => 1,);
    }
}
