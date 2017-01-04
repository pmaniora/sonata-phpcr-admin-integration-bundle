<?php

/*
 * This file is part of the Symfony CMF package.
 *
 * (c) 2011-2017 Symfony CMF
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Cmf\Bundle\MenuBundle\Tests\WebTest\Admin\Extension;

use Symfony\Cmf\Component\Testing\Functional\BaseTestCase;
use Symfony\Cmf\Bundle\SonataPhpcrAdminIntegrationBundle\Tests\Resources\DataFixtures\Phpcr\LoadMenuData;

class MenuNodeReferrersExtensionTest extends BaseTestCase
{
    public function setUp()
    {
        $this->db('PHPCR')->loadFixtures([LoadMenuData::class]);
        $this->client = $this->createClient();
    }

    public function testEdit()
    {
        $crawler = $this->client->request('GET', '/admin/cmf/menu-test/content/test/content-menu-item-1/edit');
        $res = $this->client->getResponse();
        $this->assertResponseSuccess($res);

        $button = $crawler->selectButton('Update');
        $form = $button->form();
        $node = $form->getFormNode();
        $actionUrl = $node->getAttribute('action');
        $uniqId = substr(strstr($actionUrl, '='), 1);

        $form[$uniqId.'[menuNodes][0][label]'] = 'Test Value';

        $crawler = $this->client->submit($form);
        $res = $this->client->getResponse();

        // If we have a 302 redirect, then all is well
        $this->assertEquals(302, $res->getStatusCode());

        $crawler = $this->client->request('GET', '/admin/cmf/menu-test/content/test/content-menu-item-1/edit');
        $this->assertCount(1, $crawler->filter('input[value="Test Value"]'));
    }
}
