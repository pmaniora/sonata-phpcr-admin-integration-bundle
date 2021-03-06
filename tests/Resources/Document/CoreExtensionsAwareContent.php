<?php

namespace Symfony\Cmf\Bundle\SonataPhpcrAdminIntegrationBundle\Tests\Resources\Document;

use Symfony\Cmf\Bundle\CoreBundle\PublishWorkflow\PublishableInterface;
use Symfony\Cmf\Bundle\CoreBundle\PublishWorkflow\PublishTimePeriodInterface;
use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCRODM;

/**
 * @PHPCRODM\Document(referenceable=true)
 */
class CoreExtensionsAwareContent extends ContentBase implements PublishableInterface, PublishTimePeriodInterface
{
    /**
     * {@inheritdoc}
     */
    public function setPublishStartDate(\DateTime $publishDate = null)
    {
        // TODO: Implement setPublishStartDate() method.
    }

    /**
     * {@inheritdoc}
     */
    public function setPublishEndDate(\DateTime $publishDate = null)
    {
        // TODO: Implement setPublishEndDate() method.
    }

    /**
     * {@inheritdoc}
     */
    public function getPublishStartDate()
    {
        // TODO: Implement getPublishStartDate() method.
    }

    /**
     * {@inheritdoc}
     */
    public function getPublishEndDate()
    {
        // TODO: Implement getPublishEndDate() method.
    }

    /**
     * {@inheritdoc}
     */
    public function setPublishable($publishable)
    {
        // TODO: Implement setPublishable() method.
    }

    /**
     * {@inheritdoc}
     */
    public function isPublishable()
    {
        // TODO: Implement isPublishable() method.
    }
}
