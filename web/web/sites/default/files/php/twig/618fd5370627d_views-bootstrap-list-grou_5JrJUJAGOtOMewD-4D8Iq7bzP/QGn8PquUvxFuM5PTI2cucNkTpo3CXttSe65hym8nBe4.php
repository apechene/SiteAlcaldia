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

/* sites/sitio_web/modules/views_bootstrap/templates/views-bootstrap-list-group.html.twig */
class __TwigTemplate_7fddae6048be7babafb5fd2d7cc84d79cb56ad18cf5f98056283e5e037aa2e76 extends \Twig\Template
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
        // line 17
        $context["classes"] = [0 => "views-view-list-group"];
        // line 21
        echo "
<ul id=\"";
        // line 22
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["id"] ?? null), 22, $this->source), "html", null, true);
        echo "\" ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 22), 22, $this->source), "html", null, true);
        echo ">
    ";
        // line 23
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["rows"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["row"]) {
            // line 24
            echo "      <li class=\"list-group-item\">
          ";
            // line 25
            if (twig_get_attribute($this->env, $this->source, $context["row"], "title", [], "any", false, false, true, 25)) {
                // line 26
                echo "              <h4 class=\"list-group-item-heading\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["row"], "title", [], "any", false, false, true, 26), 26, $this->source), "html", null, true);
                echo "</h4>
          ";
            }
            // line 28
            echo "          <p class=\"list-group-item-text\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["row"], "content", [], "any", false, false, true, 28), 28, $this->source), "html", null, true);
            echo "</p>
      </li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 31
        echo "</ul>
";
    }

    public function getTemplateName()
    {
        return "sites/sitio_web/modules/views_bootstrap/templates/views-bootstrap-list-group.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  75 => 31,  65 => 28,  59 => 26,  57 => 25,  54 => 24,  50 => 23,  44 => 22,  41 => 21,  39 => 17,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file views-bootstrap-list-group.html.twig
 * Default simple view template to display Bootstrap List Group.
 *
 * Available variables:
 * - view: The view object.
 * - rows: A list of the view's row items.
 * - id: A valid HTML ID and guaranteed to be unique.
 *
 * @see template_preprocess_views_bootstrap_list_group()
 *
 * @ingroup views_templates
 */
#}
{%
  set classes = [
    'views-view-list-group',
  ]
%}

<ul id=\"{{ id }}\" {{ attributes.addClass(classes) }}>
    {% for key, row in rows %}
      <li class=\"list-group-item\">
          {% if row.title %}
              <h4 class=\"list-group-item-heading\">{{ row.title }}</h4>
          {% endif %}
          <p class=\"list-group-item-text\">{{ row.content }}</p>
      </li>
    {% endfor %}
</ul>
", "sites/sitio_web/modules/views_bootstrap/templates/views-bootstrap-list-group.html.twig", "/home/u442037593/domains/pruebasanderson.xyz/public_html/web/sites/sitio_web/modules/views_bootstrap/templates/views-bootstrap-list-group.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 17, "for" => 23, "if" => 25);
        static $filters = array("escape" => 22);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'for', 'if'],
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
