<?php
/*
 * WellCommerce Open-Source E-Commerce Platform
 * 
 * This file is part of the WellCommerce package.
 *
 * (c) Adam Piotrowski <adam@wellcommerce.org>
 * 
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */

namespace WellCommerce\Bundle\AvailabilityBundle\Tests\Repository;

use WellCommerce\Bundle\CoreBundle\Test\Repository\AbstractRepositoryTestCase;

/**
 * Class AvailabilityRepositoryTest
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class AvailabilityRepositoryTest extends AbstractRepositoryTestCase
{
    protected function getService()
    {
        return $this->container->get('availability.repository');
    }

    public function testRepositoryHasDatasetQueryBuilder()
    {
        $repository = $this->getService();
        if (null !== $repository) {
            $this->assertInstanceOf('Doctrine\ORM\QueryBuilder', $repository->getDataSetQueryBuilder());
        }
    }
}
