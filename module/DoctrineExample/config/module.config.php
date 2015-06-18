<?php
return array(
    'doctrine' => array(
        'driver' => array(
            'my_annotation_driver' => array(
                'class' => 'Doctrine\\ORM\\Mapping\\Driver\\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(
                    0 => __DIR__ . '/../src/DoctrineExample/Entity',
                ),
            ),
            'orm_default' => array(
                'drivers' => array(
                    'DoctrineExample\\Entity' => 'my_annotation_driver',
                ),
            ),
        ),
    ),
    'router' => array(
        'routes' => array(
            'doctrine-example.rest.doctrine.planet' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/planet[/:planet_id]',
                    'defaults' => array(
                        'controller' => 'DoctrineExample\\V1\\Rest\\Planet\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'doctrine-example.rest.doctrine.planet',
        ),
    ),
    'zf-rest' => array(
        'DoctrineExample\\V1\\Rest\\Planet\\Controller' => array(
            'listener' => 'DoctrineExample\\V1\\Rest\\Planet\\PlanetResource',
            'route_name' => 'doctrine-example.rest.doctrine.planet',
            'route_identifier_name' => 'planet_id',
            'entity_identifier_name' => 'id',
            'collection_name' => 'planet',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'DoctrineExample\\Entity\\Planet',
            'collection_class' => 'DoctrineExample\\V1\\Rest\\Planet\\PlanetCollection',
            'service_name' => 'Planet',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'DoctrineExample\\V1\\Rest\\Planet\\Controller' => 'HalJson',
        ),
        'accept-whitelist' => array(
            'DoctrineExample\\V1\\Rest\\Planet\\Controller' => array(
                0 => 'application/vnd.doctrine-example.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content-type-whitelist' => array(
            'DoctrineExample\\V1\\Rest\\Planet\\Controller' => array(
                0 => 'application/vnd.doctrine-example.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'DoctrineExample\\Entity\\Planet' => array(
                'route_identifier_name' => 'planet_id',
                'entity_identifier_name' => 'id',
                'route_name' => 'doctrine-example.rest.doctrine.planet',
                'hydrator' => 'DoctrineExample\\V1\\Rest\\Planet\\PlanetHydrator',
            ),
            'DoctrineExample\\V1\\Rest\\Planet\\PlanetCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'doctrine-example.rest.doctrine.planet',
                'is_collection' => true,
            ),
        ),
    ),
    'zf-apigility' => array(
        'doctrine-connected' => array(
            'DoctrineExample\\V1\\Rest\\Planet\\PlanetResource' => array(
                'object_manager' => 'doctrine.entitymanager.orm_default',
                'hydrator' => 'DoctrineExample\\V1\\Rest\\Planet\\PlanetHydrator',
            ),
        ),
    ),
    'doctrine-hydrator' => array(
        'DoctrineExample\\V1\\Rest\\Planet\\PlanetHydrator' => array(
            'entity_class' => 'DoctrineExample\\Entity\\Planet',
            'object_manager' => 'doctrine.entitymanager.orm_default',
            'by_value' => true,
            'strategies' => array(),
            'use_generated_hydrator' => true,
        ),
    ),
    'zf-content-validation' => array(
        'DoctrineExample\\V1\\Rest\\Planet\\Controller' => array(
            'input_filter' => 'DoctrineExample\\V1\\Rest\\Planet\\Validator',
        ),
    ),
    'input_filter_specs' => array(
        'DoctrineExample\\V1\\Rest\\Planet\\Validator' => array(
            0 => array(
                'name' => 'name',
                'required' => true,
                'filters' => array(
                    0 => array(
                        'name' => 'Zend\\Filter\\StringTrim',
                    ),
                    1 => array(
                        'name' => 'Zend\\Filter\\StripTags',
                    ),
                ),
                'validators' => array(
                    0 => array(
                        'name' => 'Zend\\Validator\\StringLength',
                        'options' => array(
                            'min' => 1,
                            'max' => 100,
                        ),
                    ),
                ),
            ),
        ),
    ),
);
