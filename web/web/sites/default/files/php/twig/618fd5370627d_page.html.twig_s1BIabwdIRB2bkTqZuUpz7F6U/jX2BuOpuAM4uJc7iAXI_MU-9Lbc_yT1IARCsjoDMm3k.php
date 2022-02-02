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

/* sites/sitio_web/themes/custom/web_ppal_cartagena/templates/layout/page.html.twig */
class __TwigTemplate_e4f2cc49413994a01c671beae75b29c49cba53c605ddb90051e1058ade5a8ec6 extends \Twig\Template
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
        // line 46
        $context["nav_classes"] = ((("navbar navbar-expand-lg" . (((        // line 47
($context["b4_navbar_schema"] ?? null) != "none")) ? ((" navbar-" . $this->sandbox->ensureToStringAllowed(($context["b4_navbar_schema"] ?? null), 47, $this->source))) : (" "))) . (((        // line 48
($context["b4_navbar_schema"] ?? null) != "none")) ? ((((($context["b4_navbar_schema"] ?? null) == "dark")) ? (" text-light") : (" text-dark"))) : (" "))) . (((        // line 49
($context["b4_navbar_bg_schema"] ?? null) != "none")) ? ((" bg-" . $this->sandbox->ensureToStringAllowed(($context["b4_navbar_bg_schema"] ?? null), 49, $this->source))) : (" ")));
        // line 51
        echo "
";
        // line 53
        $context["footer_classes"] = (((" " . (((        // line 54
($context["b4_footer_schema"] ?? null) != "none")) ? ((" footer-" . $this->sandbox->ensureToStringAllowed(($context["b4_footer_schema"] ?? null), 54, $this->source))) : (" "))) . (((        // line 55
($context["b4_footer_schema"] ?? null) != "none")) ? ((((($context["b4_footer_schema"] ?? null) == "dark")) ? (" text-light") : (" text-dark"))) : (" "))) . (((        // line 56
($context["b4_footer_bg_schema"] ?? null) != "none")) ? ((" bg-" . $this->sandbox->ensureToStringAllowed(($context["b4_footer_bg_schema"] ?? null), 56, $this->source))) : (" ")));
        // line 58
        echo "
<header>
  ";
        // line 60
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header", [], "any", false, false, true, 60), 60, $this->source), "html", null, true);
        echo "

  ";
        // line 62
        if (((twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "nav_branding", [], "any", false, false, true, 62) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "nav_main", [], "any", false, false, true, 62)) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "nav_additional", [], "any", false, false, true, 62))) {
            // line 63
            echo "  <nav class=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["nav_classes"] ?? null), 63, $this->source), "html", null, true);
            echo "\">
    <div class=\"";
            // line 64
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["b4_top_container"] ?? null), 64, $this->source), "html", null, true);
            echo " row mx-auto\">
      <div class=\"col-auto p-0\">
      ";
            // line 66
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "nav_branding", [], "any", false, false, true, 66), 66, $this->source), "html", null, true);
            echo "
      </div>

      <div class=\"col-3 col-md-auto p-0 text-right\">
        <button class=\"navbar-toggler collapsed\" type=\"button\" data-toggle=\"collapse\"
                data-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\"
                aria-expanded=\"false\" aria-label=\"Toggle navigation\">
          <span class=\"navbar-toggler-icon\"></span>
        </button>
      </div>

      <div class=\"collapse navbar-collapse col-12 col-md-auto p-0 justify-content-end\" id=\"navbarSupportedContent\">
        ";
            // line 78
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "nav_main", [], "any", false, false, true, 78), 78, $this->source), "html", null, true);
            echo "
        ";
            // line 79
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "nav_additional", [], "any", false, false, true, 79), 79, $this->source), "html", null, true);
            echo "
      </div>
    </div>
  </nav>
  ";
        }
        // line 84
        echo "
  ";
        // line 85
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "nav_accesibilidad", [], "any", false, false, true, 85)) {
            // line 86
            echo "    <div id=\"accesibilidad-container\">

    ";
            // line 88
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "nav_accesibilidad", [], "any", false, false, true, 88), 88, $this->source), "html", null, true);
            echo "

    </div>

  ";
        }
        // line 93
        echo "</header>

";
        // line 95
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "banner", [], "any", false, false, true, 95)) {
            // line 96
            echo "    <div class=\"banner-slider\">
      ";
            // line 97
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "banner", [], "any", false, false, true, 97), 97, $this->source), "html", null, true);
            echo "
    </div>
";
        }
        // line 100
        echo "

<main role=\"main\" id=\"container-main\">
  <a id=\"main-content\" tabindex=\"-1\"></a>";
        // line 104
        echo "
  ";
        // line 106
        $context["sidebar_first_classes"] = (((twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 106) && twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 106))) ? ("col-12 col-sm-6 col-lg-3") : ("col-12 col-lg-3"));
        // line 108
        echo "
  ";
        // line 110
        $context["sidebar_second_classes"] = (((twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 110) && twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 110))) ? ("col-12 col-sm-6 col-lg-3") : ("col-12 col-lg-3"));
        // line 112
        echo "
  ";
        // line 114
        $context["content_classes"] = (((twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 114) && twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 114))) ? ("col-12 col-lg-6") : ((((twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 114) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 114))) ? ("col-12 col-lg-9") : ("col-12"))));
        // line 116
        echo "

  <div class=\"";
        // line 118
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["b4_top_container"] ?? null), 118, $this->source), "html", null, true);
        echo "\">
    ";
        // line 119
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "breadcrumb", [], "any", false, false, true, 119)) {
            // line 120
            echo "      ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "breadcrumb", [], "any", false, false, true, 120), 120, $this->source), "html", null, true);
            echo "
    ";
        }
        // line 122
        echo "    <div class=\"row no-gutters\">
      ";
        // line 123
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 123)) {
            // line 124
            echo "        <div class=\"order-2 order-lg-1 ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["sidebar_first_classes"] ?? null), 124, $this->source), "html", null, true);
            echo "\">
          ";
            // line 125
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 125), 125, $this->source), "html", null, true);
            echo "
        </div>
      ";
        }
        // line 128
        echo "      <div class=\"order-1 order-lg-2 ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content_classes"] ?? null), 128, $this->source), "html", null, true);
        echo "\">
        ";
        // line 129
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 129), 129, $this->source), "html", null, true);
        echo "
      </div>
      ";
        // line 131
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 131)) {
            // line 132
            echo "        <div class=\"order-3 ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["sidebar_second_classes"] ?? null), 132, $this->source), "html", null, true);
            echo "\">
          ";
            // line 133
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 133), 133, $this->source), "html", null, true);
            echo "
        </div>
      ";
        }
        // line 136
        echo "    </div>
  </div>

</main>
 

  ";
        // line 142
        if (((twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_first", [], "any", false, false, true, 142) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_second", [], "any", false, false, true, 142)) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_third", [], "any", false, false, true, 142))) {
            // line 143
            echo "
    <div class=\"footer row\">
          ";
            // line 145
            if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_first", [], "any", false, false, true, 145)) {
                // line 146
                echo "            <div class = \"footer-col col-6 col-md-4 col1\">
              ";
                // line 147
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_first", [], "any", false, false, true, 147), 147, $this->source), "html", null, true);
                echo "
            </div>
          ";
            }
            // line 150
            echo "
          ";
            // line 151
            if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_second", [], "any", false, false, true, 151)) {
                // line 152
                echo "            <div class = \"footer-col col-6 col-md-4\">
              ";
                // line 153
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_second", [], "any", false, false, true, 153), 153, $this->source), "html", null, true);
                echo "
            </div>
          ";
            }
            // line 156
            echo "
          ";
            // line 157
            if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_third", [], "any", false, false, true, 157)) {
                // line 158
                echo "            <div class = \"footer-col col-6 col-md-4\">
              ";
                // line 159
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_third", [], "any", false, false, true, 159), 159, $this->source), "html", null, true);
                echo "
            </div>
          ";
            }
            // line 162
            echo "    </div>

  ";
        }
        // line 165
        echo "
  ";
        // line 166
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "copyright", [], "any", false, false, true, 166)) {
            echo "  
  <div id=\"copyright-footer\">
  ";
            // line 168
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "copyright", [], "any", false, false, true, 168), 168, $this->source), "html", null, true);
            echo "
  </div>
  ";
        }
        // line 171
        echo "

";
        // line 184
        echo "
";
    }

    public function getTemplateName()
    {
        return "sites/sitio_web/themes/custom/web_ppal_cartagena/templates/layout/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  283 => 184,  279 => 171,  273 => 168,  268 => 166,  265 => 165,  260 => 162,  254 => 159,  251 => 158,  249 => 157,  246 => 156,  240 => 153,  237 => 152,  235 => 151,  232 => 150,  226 => 147,  223 => 146,  221 => 145,  217 => 143,  215 => 142,  207 => 136,  201 => 133,  196 => 132,  194 => 131,  189 => 129,  184 => 128,  178 => 125,  173 => 124,  171 => 123,  168 => 122,  162 => 120,  160 => 119,  156 => 118,  152 => 116,  150 => 114,  147 => 112,  145 => 110,  142 => 108,  140 => 106,  137 => 104,  132 => 100,  126 => 97,  123 => 96,  121 => 95,  117 => 93,  109 => 88,  105 => 86,  103 => 85,  100 => 84,  92 => 79,  88 => 78,  73 => 66,  68 => 64,  63 => 63,  61 => 62,  56 => 60,  52 => 58,  50 => 56,  49 => 55,  48 => 54,  47 => 53,  44 => 51,  42 => 49,  41 => 48,  40 => 47,  39 => 46,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Theme override to display a single page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.html.twig template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - base_path: The base URL path of the Drupal installation. Will usually be
 *   \"/\" unless you have installed Drupal in a sub-directory.
 * - is_front: A flag indicating if the current page is the front page.
 * - logged_in: A flag indicating if the user is registered and signed in.
 * - is_admin: A flag indicating if the user has permission to access
 *   administration pages.
 *
 * Site identity:
 * - front_page: The URL of the front page. Use this instead of base_path when
 *   linking to the front page. This includes the language domain or prefix.
 *
 * Page content (in order of occurrence in the default page.html.twig):
 * - node: Fully loaded node, if there is an automatically-loaded node
 *   associated with the page and the node ID is the second argument in the
 *   page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - page.header: Items for the header region.
 * - page.primary_menu: Items for the primary menu region.
 * - page.secondary_menu: Items for the secondary menu region.
 * - page.highlighted: Items for the highlighted content region.
 * - page.help: Dynamic help text, mostly for admin pages.
 * - page.content: The main content of the current page.
 * - page.sidebar_first: Items for the first sidebar.
 * - page.sidebar_second: Items for the second sidebar.
 * - page.footer: Items for the footer region.
 * - page.breadcrumb: Items for the breadcrumb region.
 *
 * @see template_preprocess_page()
 * @see html.html.twig
 */
#}
{%
set nav_classes = 'navbar navbar-expand-lg' ~
  (b4_navbar_schema != 'none' ? \" navbar-#{b4_navbar_schema}\" : ' ') ~
  (b4_navbar_schema != 'none' ? (b4_navbar_schema == 'dark' ? ' text-light' : ' text-dark' ) : ' ') ~
  (b4_navbar_bg_schema != 'none' ? \" bg-#{b4_navbar_bg_schema}\" : ' ')
%}

{%
set footer_classes = ' ' ~
  (b4_footer_schema != 'none' ? \" footer-#{b4_footer_schema}\" : ' ') ~
  (b4_footer_schema != 'none' ? (b4_footer_schema == 'dark' ? ' text-light' : ' text-dark' ) : ' ') ~
  (b4_footer_bg_schema != 'none' ? \" bg-#{b4_footer_bg_schema}\" : ' ')
%}

<header>
  {{ page.header }}

  {% if page.nav_branding or page.nav_main or page.nav_additional %}
  <nav class=\"{{ nav_classes }}\">
    <div class=\"{{ b4_top_container }} row mx-auto\">
      <div class=\"col-auto p-0\">
      {{ page.nav_branding }}
      </div>

      <div class=\"col-3 col-md-auto p-0 text-right\">
        <button class=\"navbar-toggler collapsed\" type=\"button\" data-toggle=\"collapse\"
                data-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\"
                aria-expanded=\"false\" aria-label=\"Toggle navigation\">
          <span class=\"navbar-toggler-icon\"></span>
        </button>
      </div>

      <div class=\"collapse navbar-collapse col-12 col-md-auto p-0 justify-content-end\" id=\"navbarSupportedContent\">
        {{ page.nav_main }}
        {{ page.nav_additional }}
      </div>
    </div>
  </nav>
  {% endif %}

  {% if page.nav_accesibilidad %}
    <div id=\"accesibilidad-container\">

    {{page.nav_accesibilidad}}

    </div>

  {% endif %}
</header>

{% if page.banner %}
    <div class=\"banner-slider\">
      {{page.banner}}
    </div>
{% endif %}


<main role=\"main\" id=\"container-main\">
  <a id=\"main-content\" tabindex=\"-1\"></a>{# link is in html.html.twig #}

  {%
  set sidebar_first_classes = (page.sidebar_first and page.sidebar_second) ? 'col-12 col-sm-6 col-lg-3' : 'col-12 col-lg-3'
  %}

  {%
  set sidebar_second_classes = (page.sidebar_first and page.sidebar_second) ? 'col-12 col-sm-6 col-lg-3' : 'col-12 col-lg-3'
  %}

  {%
  set content_classes = (page.sidebar_first and page.sidebar_second) ? 'col-12 col-lg-6' : ((page.sidebar_first or page.sidebar_second) ? 'col-12 col-lg-9' : 'col-12' )
   %}


  <div class=\"{{ b4_top_container }}\">
    {% if page.breadcrumb %}
      {{ page.breadcrumb }}
    {% endif %}
    <div class=\"row no-gutters\">
      {% if page.sidebar_first %}
        <div class=\"order-2 order-lg-1 {{ sidebar_first_classes }}\">
          {{ page.sidebar_first }}
        </div>
      {% endif %}
      <div class=\"order-1 order-lg-2 {{ content_classes }}\">
        {{ page.content }}
      </div>
      {% if page.sidebar_second %}
        <div class=\"order-3 {{ sidebar_second_classes }}\">
          {{ page.sidebar_second }}
        </div>
      {% endif %}
    </div>
  </div>

</main>
 

  {% if page.footer_first or page.footer_second or page.footer_third %}

    <div class=\"footer row\">
          {% if page.footer_first %}
            <div class = \"footer-col col-6 col-md-4 col1\">
              {{ page.footer_first }}
            </div>
          {% endif %}

          {% if page.footer_second %}
            <div class = \"footer-col col-6 col-md-4\">
              {{ page.footer_second }}
            </div>
          {% endif %}

          {% if page.footer_third %}
            <div class = \"footer-col col-6 col-md-4\">
              {{ page.footer_third }}
            </div>
          {% endif %}
    </div>

  {% endif %}

  {% if page.copyright%}  
  <div id=\"copyright-footer\">
  {{page.copyright}}
  </div>
  {% endif %}


{#
{% if page.footer %}
<footer class=\"mt-auto {{ footer_classes }}\">
  <div class=\"{{ b4_top_container }}\">
    {{ page.footer }}
  </div>
</footer>


{% endif %}
#}

", "sites/sitio_web/themes/custom/web_ppal_cartagena/templates/layout/page.html.twig", "/home/u442037593/domains/pruebasanderson.xyz/public_html/web/sites/sitio_web/themes/custom/web_ppal_cartagena/templates/layout/page.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 46, "if" => 62);
        static $filters = array("escape" => 60);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
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
