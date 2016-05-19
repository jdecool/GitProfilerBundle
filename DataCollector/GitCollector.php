<?php

namespace JDecool\Bundle\GitProfilerBundle\DataCollector;

use GitElephant\Exception\InvalidRepositoryPathException;
use GitElephant\Repository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\DataCollector\DataCollector;

class GitCollector extends DataCollector
{
    /** @var string */
    private $rootDir;

    /**
     * Constructor
     *
     * @param string $rootDir
     */
    public function __construct($rootDir)
    {
        $this->rootDir = realpath($rootDir);
        if (false === $this->rootDir) {
            throw new \InvalidArgumentException(sprintf('"%s" is not a valid path.', $rootDir));
        }
    }

    /**
     * {@inheritdoc}
     */
    public function collect(Request $request, Response $response, \Exception $exception = null)
    {
        try {
            $repository = new Repository($this->rootDir);

            $this->data = [
                'repository' => $repository,
                'branch'     => $repository->getMainBranch(),
            ];
        } catch (InvalidRepositoryPathException $e) {

        }
    }

    /**
     * Get repository information
     *
     * @return Repository
     */
    public function getRepository()
    {
        return $this->data['repository'];
    }

    /**
     * Get branch information
     *
     * @return \GitElephant\Objects\Branch
     */
    public function getBranch()
    {
        return $this->data['branch'];
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'jdecool.git_collector';
    }
}
