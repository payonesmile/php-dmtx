<?php

namespace Dmtx;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Process\ProcessBuilder;

class Reader extends AbstractDmtx
{
    protected $arguments = array(
        'newline',
        'unicode',
        'milliseconds',
        'codewords',
        'minimum-edge',
        'maximum-edge',
        'gap',
        'page',
        'square-deviation',
        'resolution',
        'symbol-size',
        'threshold',
        'x-range-min',
        'x-range-max',
        'y-range-min',
        'y-range-max',
        'corrections-max',
        'diagnose',
        'mosaic',
        'stop-after',
        'page-numbers',
        'corners',
        'shrink'
    );

    protected function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'unicode' => true,
            'milliseconds' => 200,
            'symbol-size' => 'square-auto',
            'process-timeout' => 600,
            'command' => 'dmtxread'
        ));

        $resolver->setOptional(array(
            'newline',
            'unicode',
            'milliseconds',
            'codewords',
            'minimum-edge',
            'maximum-edge',
            'gap',
            'page',
            'square-deviation',
            'resolution',
            'symbol-size',
            'threshold',
            'x-range-min',
            'x-range-max',
            'y-range-min',
            'y-range-max',
            'corrections-max',
            'diagnose',
            'mosaic',
            'stop-after',
            'page-numbers',
            'corners',
            'shrink'
        ));

        $resolver->setAllowedValues(array(
            'symbol-size' => array(
                'square-auto',
                'rectangle-auto',
                '10x10',
                '24x24',
                '64x64'
            )
        ));

        $resolver->setAllowedTypes(array(
            'newline' => 'bool',
            'unicode' => 'bool',
            'milliseconds' => 'integer',
            'codewords' => 'bool',
            'minimum-edge' => 'integer',
            'maximum-edge' => 'integer',
            'gap' => 'integer',
            'page' => 'integer',
            'square-deviation' => 'integer',
            'resolution' => 'integer',
            'threshold' => 'integer',
            'corrections-max' => 'integer',
            'diagnose' => 'bool',
            'mosaic' => 'bool',
            'stop-after' => 'integer',
            'page-numbers' => 'bool',
            'corners' => 'bool',
            'shrink' => 'integer'

        ));
    }

    public function decode($encoded_string)
    {
        return $this->run(
            $this->getCmd(),
            $encoded_string
        );
    }

    public function decodeFile($filename)
    {
        return $this->run(
            $this->getCmd(),
            file_get_contents($filename)
        );
    }


    public function processBuilder()
    {
        return $this->getProcessBuilder(
            $this->getCmd()
        );
    }
}
