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

namespace WellCommerce\Bundle\CategoryBundle\Controller\Box;

use Symfony\Component\HttpFoundation\Request;
use WellCommerce\Bundle\CoreBundle\Controller\Box\AbstractBoxController;
use WellCommerce\Bundle\CoreBundle\Controller\Box\BoxControllerInterface;
use WellCommerce\Bundle\CoreBundle\DataSet\Conditions\Condition;
use WellCommerce\Bundle\CoreBundle\DataSet\Conditions\ConditionsCollection;
use WellCommerce\Bundle\CoreBundle\DataSet\Request\DataSetRequest;
use WellCommerce\Bundle\ProductBundle\Collection\Item;
use WellCommerce\Bundle\ProductBundle\Collection\ProductCollection;

/**
 * Class CategoryProductsBoxController
 *
 * @package WellCommerce\Bundle\CategoryBundle\Controller\Box
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 *
 * @Sensio\Bundle\FrameworkExtraBundle\Configuration\Template()
 */
class CategoryProductsBoxController extends AbstractBoxController implements BoxControllerInterface
{
    public function indexAction(Request $request)
    {
        $conditions = new ConditionsCollection();
        $conditions->add(new Condition\Eq('category', 4));

        $results = $this->get('product.dataset.front')->getResults(new DataSetRequest([
            'limit'      => 10,
            'orderBy'    => 'name',
            'orderDir'   => 'asc',
            'conditions' => $conditions
        ]));

        return [
            'dataset' => $results
        ];
    }
}