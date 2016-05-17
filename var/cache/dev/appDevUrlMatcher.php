<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/js/4dc3873')) {
            // _assetic_4dc3873
            if ($pathinfo === '/js/4dc3873.js') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => '4dc3873',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_4dc3873',);
            }

            if (0 === strpos($pathinfo, '/js/4dc3873_')) {
                // _assetic_4dc3873_0
                if ($pathinfo === '/js/4dc3873_jquery.flagstrap.min_1.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '4dc3873',  'pos' => 0,  '_format' => 'js',  '_route' => '_assetic_4dc3873_0',);
                }

                // _assetic_4dc3873_1
                if ($pathinfo === '/js/4dc3873_commande_2.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '4dc3873',  'pos' => 1,  '_format' => 'js',  '_route' => '_assetic_4dc3873_1',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/css/ba1a5fe')) {
            // _assetic_ba1a5fe
            if ($pathinfo === '/css/ba1a5fe.css') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => 'ba1a5fe',  'pos' => NULL,  '_format' => 'css',  '_route' => '_assetic_ba1a5fe',);
            }

            if (0 === strpos($pathinfo, '/css/ba1a5fe_part_1_')) {
                // _assetic_ba1a5fe_0
                if ($pathinfo === '/css/ba1a5fe_part_1_bootstrap.min_1.css') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'ba1a5fe',  'pos' => 0,  '_format' => 'css',  '_route' => '_assetic_ba1a5fe_0',);
                }

                if (0 === strpos($pathinfo, '/css/ba1a5fe_part_1_flags_')) {
                    // _assetic_ba1a5fe_1
                    if ($pathinfo === '/css/ba1a5fe_part_1_flags_2.css') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'ba1a5fe',  'pos' => 1,  '_format' => 'css',  '_route' => '_assetic_ba1a5fe_1',);
                    }

                    // _assetic_ba1a5fe_2
                    if ($pathinfo === '/css/ba1a5fe_part_1_flags_3.css') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'ba1a5fe',  'pos' => 2,  '_format' => 'css',  '_route' => '_assetic_ba1a5fe_2',);
                    }

                }

                if (0 === strpos($pathinfo, '/css/ba1a5fe_part_1_jquery-ui.')) {
                    // _assetic_ba1a5fe_3
                    if ($pathinfo === '/css/ba1a5fe_part_1_jquery-ui.min_4.css') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'ba1a5fe',  'pos' => 3,  '_format' => 'css',  '_route' => '_assetic_ba1a5fe_3',);
                    }

                    // _assetic_ba1a5fe_4
                    if ($pathinfo === '/css/ba1a5fe_part_1_jquery-ui.structure.min_5.css') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'ba1a5fe',  'pos' => 4,  '_format' => 'css',  '_route' => '_assetic_ba1a5fe_4',);
                    }

                    // _assetic_ba1a5fe_5
                    if ($pathinfo === '/css/ba1a5fe_part_1_jquery-ui.theme.min_6.css') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'ba1a5fe',  'pos' => 5,  '_format' => 'css',  '_route' => '_assetic_ba1a5fe_5',);
                    }

                }

                // _assetic_ba1a5fe_6
                if ($pathinfo === '/css/ba1a5fe_part_1_style_7.css') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'ba1a5fe',  'pos' => 6,  '_format' => 'css',  '_route' => '_assetic_ba1a5fe_6',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/images')) {
            if (0 === strpos($pathinfo, '/images/0a109d1')) {
                // _assetic_0a109d1
                if ($pathinfo === '/images/0a109d1.png') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '0a109d1',  'pos' => NULL,  '_format' => 'png',  '_route' => '_assetic_0a109d1',);
                }

                // _assetic_0a109d1_0
                if ($pathinfo === '/images/0a109d1_logo_louvre_1.png') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '0a109d1',  'pos' => 0,  '_format' => 'png',  '_route' => '_assetic_0a109d1_0',);
                }

            }

            if (0 === strpos($pathinfo, '/images/27e4fa2')) {
                // _assetic_27e4fa2
                if ($pathinfo === '/images/27e4fa2.png') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '27e4fa2',  'pos' => NULL,  '_format' => 'png',  '_route' => '_assetic_27e4fa2',);
                }

                // _assetic_27e4fa2_0
                if ($pathinfo === '/images/27e4fa2_home_crumb_1.png') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '27e4fa2',  'pos' => 0,  '_format' => 'png',  '_route' => '_assetic_27e4fa2_0',);
                }

            }

            if (0 === strpos($pathinfo, '/images/6c06257')) {
                // _assetic_6c06257
                if ($pathinfo === '/images/6c06257.gif') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '6c06257',  'pos' => NULL,  '_format' => 'gif',  '_route' => '_assetic_6c06257',);
                }

                // _assetic_6c06257_0
                if ($pathinfo === '/images/6c06257_mastercard_1.gif') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '6c06257',  'pos' => 0,  '_format' => 'gif',  '_route' => '_assetic_6c06257_0',);
                }

            }

            if (0 === strpos($pathinfo, '/images/f0113c6')) {
                // _assetic_f0113c6
                if ($pathinfo === '/images/f0113c6.gif') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'f0113c6',  'pos' => NULL,  '_format' => 'gif',  '_route' => '_assetic_f0113c6',);
                }

                // _assetic_f0113c6_0
                if ($pathinfo === '/images/f0113c6_visa_1.gif') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'f0113c6',  'pos' => 0,  '_format' => 'gif',  '_route' => '_assetic_f0113c6_0',);
                }

            }

            if (0 === strpos($pathinfo, '/images/e3ad842')) {
                // _assetic_e3ad842
                if ($pathinfo === '/images/e3ad842.png') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'e3ad842',  'pos' => NULL,  '_format' => 'png',  '_route' => '_assetic_e3ad842',);
                }

                // _assetic_e3ad842_0
                if ($pathinfo === '/images/e3ad842_e.bleue_1.png') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'e3ad842',  'pos' => 0,  '_format' => 'png',  '_route' => '_assetic_e3ad842_0',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/js/810bd91')) {
            // _assetic_810bd91
            if ($pathinfo === '/js/810bd91.js') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => '810bd91',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_810bd91',);
            }

            if (0 === strpos($pathinfo, '/js/810bd91_')) {
                if (0 === strpos($pathinfo, '/js/810bd91_jquery')) {
                    // _assetic_810bd91_0
                    if ($pathinfo === '/js/810bd91_jquery.min_1.js') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => '810bd91',  'pos' => 0,  '_format' => 'js',  '_route' => '_assetic_810bd91_0',);
                    }

                    // _assetic_810bd91_1
                    if ($pathinfo === '/js/810bd91_jquery-ui.min_2.js') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => '810bd91',  'pos' => 1,  '_format' => 'js',  '_route' => '_assetic_810bd91_1',);
                    }

                }

                // _assetic_810bd91_2
                if ($pathinfo === '/js/810bd91_bootstrap.min_3.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '810bd91',  'pos' => 2,  '_format' => 'js',  '_route' => '_assetic_810bd91_2',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

        // home
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'home');
            }

            return array (  '_controller' => 'Louvres\\CommandeBundle\\Controller\\CommandeController::homeAction',  '_route' => 'home',);
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
