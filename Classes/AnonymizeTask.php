<?php
declare(strict_types=1);

namespace Aerticket\DataAnonymizer\Task;

/*
 * This file is part of the Aerticket.DataAnonymizer.Task package.
 *
 * (c) Contributors to the package
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

use Aerticket\DataAnonymizer\Service\AnonymizationService;
use Ttree\Scheduler\Annotations as Scheduler;
use Neos\Flow\Annotations as Flow;

/**
 * Automatically anonymize entities once per hour
 *
 * @Scheduler\Schedule(expression="8 * * * *")
 */
class AnonymizeTask implements \Ttree\Scheduler\Task\TaskInterface
{

    /**
     * @var AnonymizationService
     * @Flow\Inject()
     */
    protected $anonymizationService;

    /**
     * @param array
     * @return void
     */
    public function execute(array $arguments = [])
    {
        $classNames = $this->anonymizationService->getAnonymizableClassNames();

        foreach ($classNames as $className) {
            $this->anonymizationService->anonymize($className);
        }
    }

}
