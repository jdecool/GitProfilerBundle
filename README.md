GitProfilerBundle
=================

Just add Git branch/repository informations into the Symfony profiler.

## Installation

Simply run assuming you have installed composer :

```bash
$ php composer.phar require jdecool/git-profiler-bundle "^1.0"
```

## Configuration

Register the bundle in `app/AppKernel.php` :

``` php
// app/AppKernel.php
public function registerBundles()
{
    $bundles = array(/* ... */);

    if (in_array($this->getEnvironment(), array('dev', 'test'), true)) {
        // ...
        $bundles[] = new JDecool\Bundle\GitProfilerBundle\JDecoolGitProfilerBundle();
    }

    return $bundles;
}
```

