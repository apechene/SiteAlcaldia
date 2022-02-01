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

/* core/themes/seven/templates/status-report-grouped.html.twig */
class __TwigTemplate_fdd0b859184eb63d8d8e668188e57d71ff3c80ab1e6497010952022010ad15be extends \Twig\Template
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
        // line 19
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("core/drupal.collapse"), "html", null, true);
        echo "
";
        // line 20
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("seven/drupal.responsive-detail"), "html", null, true);
        echo "

<div class=\"system-status-report\">
  ";
        // line 23
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["grouped_requirements"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
            // line 24
            echo "    <div class=\"system-status-report__requirements-group\">
      <h3 id=\"";
            // line 25
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["group"], "type", [], "any", false, false, true, 25), 25, $this->source), "html", null, true);
            echo "\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["group"], "title", [], "any", false, false, true, 25), 25, $this->source), "html", null, true);
            echo "</h3>
      ";
            // line 26
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["group"], "items", [], "any", false, false, true, 26));
            foreach ($context['_seq'] as $context["_key"] => $context["requirement"]) {
                // line 27
                echo "        <details class=\"system-status-report__entry system-status-report__entry--";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["group"], "type", [], "any", false, false, true, 27), 27, $this->source), "html", null, true);
                echo " color-";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["group"], "type", [], "any", false, false, true, 27), 27, $this->source), "html", null, true);
                echo "\" open>
          ";
                // line 29
                $context["summary_classes"] = [0 => "system-status-report__status-title", 1 => ((twig_in_filter(twig_get_attribute($this->env, $this->source,                 // line 31
$context["group"], "type", [], "any", false, false, true, 31), [0 => "warning", 1 => "error"])) ? (("system-status-report__status-icon system-status-report__status-icon--" . $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["group"], "type", [], "any", false, false, true, 31), 31, $this->source))) : (""))];
                // line 34
                echo "          <summary";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute(["class" => ($context["summary_classes"] ?? null)]), "html", null, true);
                echo " role=\"button\">
            ";
                // line 35
                if (twig_get_attribute($this->env, $this->source, $context["requirement"], "severity_title", [], "any", false, false, true, 35)) {
                    // line 36
                    echo "              <span class=\"visually-hidden\">";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["requirement"], "severity_title", [], "any", false, false, true, 36), 36, $this->source), "html", null, true);
                    echo "</span>
            ";
                }
                // line 38
                echo "            ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["requirement"], "title", [], "any", false, false, true, 38), 38, $this->source), "html", null, true);
                echo "
          </summary>
          <div class=\"system-status-report__entry__value\">
            ";
                // line 41
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["requirement"], "value", [], "any", false, false, true, 41), 41, $this->source), "html", null, true);
                echo "
            ";
                // line 42
                if (twig_get_attribute($this->env, $this->source, $context["requirement"], "description", [], "any", false, false, true, 42)) {
                    // line 43
                    echo "              <div class=\"description\">";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["requirement"], "description", [], "any", false, false, true, 43), 43, $this->source), "html", null, true);
                    echo "</div>
            ";
                }
                // line 45
                echo "          </div>
        </details>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['requirement'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 48
            echo "    </div>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 50
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "core/themes/seven/templates/status-report-grouped.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  123 => 50,  116 => 48,  108 => 45,  102 => 43,  100 => 42,  96 => 41,  89 => 38,  83 => 36,  81 => 35,  76 => 34,  74 => 31,  73 => 29,  66 => 27,  62 => 26,  56 => 25,  53 => 24,  49 => 23,  43 => 20,  39 => 19,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Theme override to display status report.
 *
 * - grouped_requirements: Contains grouped requirements.
 *   Each group contains:
 *   - title: The title of the group.
 *   - type: The severity of the group.
 *   - items: The requirement instances.
 *     Each requirement item contains:
 *     - title: The title of the requirement.
 *     - value: (optional) The requirement's status.
 *     - description: (optional) The requirement's description.
 *     - severity_title: The title of the severity.
 *     - severity_status: Indicates the severity status.
 */
#}
{{ attach_library('core/drupal.collapse') }}
{{ attach_library('seven/drupal.responsive-detail') }}

<div class=\"system-status-report\">
  {% for group in grouped_requirements %}
    <div class=\"system-status-report__requirements-group\">
      <h3 id=\"{{ group.type }}\">{{ group.title }}</h3>
      {% for requirement in group.items %}
        <details class=\"system-status-report__entry system-status-report__entry--{{ group.type }} color-{{ group.type }}\" open>
          {%
            set summary_classes = [
              'system-status-report__status-title',
              group.type in ['warning', 'error'] ? 'system-status-report__status-icon system-status-report__status-icon--' ~ group.type
            ]
          %}
          <summary{{ create_attribute({'class': summary_classes}) }} role=\"button\">
            {% if requirement.severity_title  %}
              <span class=\"visually-hidden\">{{ requirement.severity_title }}</span>
            {% endif %}
            {{ requirement.title }}
          </summary>
          <div class=\"system-status-report__entry__value\">
            {{ requirement.value }}
            {% if requirement.description %}
              <div class=\"description\">{{ requirement.description }}</div>
            {% endif %}
          </div>
        </details>
      {% endfor %}
    </div>
  {% endfor %}
</div>
", "core/themes/seven/templates/status-report-grouped.html.twig", "/home/u442037593/domains/pruebasanderson.xyz/public_html/web/core/themes/seven/templates/status-report-grouped.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("for" => 23, "set" => 29, "if" => 35);
        static $filters = array("escape" => 19);
        static $functions = array("attach_library" => 19, "create_attribute" => 34);

        try {
            $this->sandbox->checkSecurity(
                ['for', 'set', 'if'],
                ['escape'],
                ['attach_library', 'create_attribute']
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