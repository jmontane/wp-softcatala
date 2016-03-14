<?php
// hook add_rewrite_rules function into rewrite_rules_array
add_filter('rewrite_rules_array', 'add_rewrite_rules');
function add_rewrite_rules($aRules) {
    //Diccionari de sinònims
    $aNewRules = array('diccionari-de-sinonims/paraula/([^/]+)/?' => 'index.php?post_type=page&pagename=diccionari-de-sinonims&paraula=$matches[1]');
    $aRules = $aNewRules + $aRules;

    //Diccionari multilingue
    $aNewRules = array('diccionari-multilingue/paraula/([^/]+)/?' => 'index.php?post_type=page&pagename=diccionari-multilingue&paraula=$matches[1]');
    $aRules = $aNewRules + $aRules;

    //Diccionari multilingue
    $aNewRules = array('diccionari-multilingue/paraula/([^/]+)/llengua/([^/]+)/?' => 'index.php?post_type=page&pagename=diccionari-multilingue&paraula=$matches[1]&llengua=$matches[2]');
    $aRules = $aNewRules + $aRules;

    //Diccionari multilingue
    $aNewRules = array('diccionari-multilingue/lletra/([a-zA-Z]+)/?' => 'index.php?post_type=page&pagename=diccionari-multilingue&lletra=$matches[1]');
    $aRules = $aNewRules + $aRules;

    //Plantilla steps
    $aNewRules = array('col·laboreu/projecte/([^/]+)/?' => 'index.php?post_type=page&pagename=col·laboreu&project=$matches[1]');
    $aRules = $aNewRules + $aRules;

    //Plantilla steps
    $cerca_base = array('cerca/([^/]+)/?' => 'index.php?s=$matches[1]');
    $cerca_base_page = array('cerca/([^/]+)/page/([0-9]{1,})/?' => 'index.php?s=$matches[1]&paged=$matches[2]');
    $aRules = $cerca_base_page + $cerca_base + $aRules;

    //Programes
    $aNewRules = array(
        'programes/p/([^/]+)/so/([^/]+)/cat/([^/]+)/arxivats/?' => 'index.php?post_type=programa&cerca=$matches[1]&sistema_operatiu=$matches[2]&categoria_programa=$matches[3]&arxivat=1',
        'programes/p/([^/]+)/so/([^/]+)/cat/([^/]+)/?' => 'index.php?post_type=programa&cerca=$matches[1]&sistema_operatiu=$matches[2]&categoria_programa=$matches[3]&arxivat=0',
        'programes/p/([^/]+)/so/([^/]+)/arxivats/?' => 'index.php?post_type=programa&cerca=$matches[1]&sistema_operatiu=$matches[2]&arxivat=1',
        'programes/p/([^/]+)/cat/([^/]+)/arxivats/?' => 'index.php?post_type=programa&cerca=$matches[1]&categoria_programa=$matches[2]&arxivat=1',
        'programes/p/([^/]+)/so/([^/]+)/?' => 'index.php?post_type=programa&cerca=$matches[1]&sistema_operatiu=$matches[2]&arxivat=0',
        'programes/p/([^/]+)/cat/([^/]+)/?' => 'index.php?post_type=programa&cerca=$matches[1]&categoria_programa=$matches[2]&arxivat=0',
        'programes/p/([^/]+)/arxivats/?' => 'index.php?post_type=programa&cerca=$matches[1]&arxivat=1',
        'programes/p/([^/]+)/?' => 'index.php?post_type=programa&cerca=$matches[1]&arxivat=0',
        'programes/so/([^/]+)/cat/([^/]+)/arxivats/?' => 'index.php?post_type=programa&sistema_operatiu=$matches[1]&categoria_programa=$matches[2]&arxivat=1',
        'programes/so/([^/]+)/arxivats/?' => 'index.php?post_type=programa&sistema_operatiu=$matches[1]&arxivat=1',
        'programes/so/([^/]+)/cat/([^/]+)/?' => 'index.php?post_type=programa&sistema_operatiu=$matches[1]&categoria_programa=$matches[2]&arxivat=0',
        'programes/so/([^/]+)/?' => 'index.php?post_type=programa&sistema_operatiu=$matches[1]',
        'programes/cat/([^/]+)/arxivats/?' => 'index.php?post_type=programa&categoria_programa=$matches[1]&arxivat=1',
        'programes/cat/([^/]+)/?' => 'index.php?post_type=programa&categoria_programa=$matches[1]',
        'programes/arxivats/?' => 'index.php?post_type=programa&arxivat=1',
    );
    $aRules = $aNewRules + $aRules;

    return $aRules;
}