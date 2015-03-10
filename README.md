
#Installation

app/AppKernel.php

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles[] = new \BespokeSupport\LocationBundle\BespokeSupportLocationBundle();
    }
}

app/config.yml

doctrine:
  orm:
    entity_managers:
      default:
        BespokeSupportLocationBundle: ~
