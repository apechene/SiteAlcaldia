<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* sites/sitio_web/themes/adminimal_theme/templates/block-content-add-list.html.twig */
class __TwigTemplate_8230a60eec0bb272b53de3ffb3d86503914879079661320f9fda7218bfae30c4 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 20
        echo "<ul class=\"admin-list\">
  ";
        // line 21
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["types"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["type"]) {
            // line 22
            echo "    <li class=\"clearfix\">
\t  <a href=\"";
            // line 23
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["type"], "url", [], "any", false, false, true, 23), 23, $this->source), "html", null, true);
            echo "\"><span class=\"label\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["type"], "label", [], "any", false, false, true, 23), 23, $this->source), "html", null, true);
            echo "</span></a>
\t  <div class=\"description\">";
            // line 24
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["type"], "description", [], "any", false, false, true, 24), 24, $this->source), "html", null, true);
            echo "</div>
    </li>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['type'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 27
        echo "</ul>
";
    }

    public function getTemplateName()
    {
        return "sites/sitio_web/themes/adminimal_theme/templates/block-content-add-list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  64 => 27,  55 => 24,  49 => 23,  46 => 22,  42 => 21,  39 => 20,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Seven's theme implementation to display a list of custom block types.
 *
 * Displays the list of available custom block types for creation.
 *
 * Available variables:
 * - types: A collection of all the available custom block types.
 *   Each type contains:
 *   - url: A link to add a block of this type.
 *   - description: A description of this custom block type.
 *   - label: The title of the custom block type.
 *   - path: A path for the link to add a block of this type.
 *
 * @see template_preprocess_block_content_add_list()
 * @see seven_preprocess_block_content_add_list()
 */
 #}
<ul class=\"admin-list\">
  {% for type in types %}
    <li class=\"clearfix\">
\t  <a href=\"{{ type.url }}\"><span class=\"label\">{{ type.label }}</span></a>
\t  <div class=\"description\">{{ type.description }}</div>
    </li>
  {% endfor %}
</ul>
", "sites/sitio_web/themes/adminimal_theme/templates/block-content-add-list.html.twig", "/home/u442037593/domains/pruebasanderson.xyz/public_html/web/sites/sitio_web/themes/adminimal_theme/templates/block-content-add-list.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("for" => 21);
        static $filters = array("escape" => 23);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['for'],
                ['escape'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
