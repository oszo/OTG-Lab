<?php

/* display/results/multi_row_operations_form.twig */
class __TwigTemplate_4ef5ab4f35dd84e2952cf98713b3f525c74a2bfa84fced618f577587f727c453 extends Twig_Template
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
        if ((((isset($context["delete_link"]) ? $context["delete_link"] : null) == (isset($context["delete_row"]) ? $context["delete_row"] : null)) || ((isset($context["delete_link"]) ? $context["delete_link"] : null) == (isset($context["kill_process"]) ? $context["kill_process"] : null)))) {
            // line 2
            echo "    <form method=\"post\"
        action=\"tbl_row_action.php\"
        name=\"resultsForm\"
        id=\"resultsForm_";
            // line 5
            echo twig_escape_filter($this->env, (isset($context["unique_id"]) ? $context["unique_id"] : null), "html", null, true);
            echo "\"
        class=\"ajax\">
        ";
            // line 7
            echo PhpMyAdmin\Url::getHiddenInputs((isset($context["db"]) ? $context["db"] : null), (isset($context["table"]) ? $context["table"] : null), 1);
            echo "
        <input type=\"hidden\" name=\"goto\" value=\"sql.php\" />
";
        }
        // line 10
        echo "
<div class=\"responsivetable\">
    <table class=\"table_results data ajax\" data-uniqueId=\"";
        // line 12
        echo twig_escape_filter($this->env, (isset($context["unique_id"]) ? $context["unique_id"] : null), "html", null, true);
        echo "\">
";
    }

    public function getTemplateName()
    {
        return "display/results/multi_row_operations_form.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  41 => 12,  37 => 10,  31 => 7,  26 => 5,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "display/results/multi_row_operations_form.twig", "/var/www/html/phpmyadmin/templates/display/results/multi_row_operations_form.twig");
    }
}
