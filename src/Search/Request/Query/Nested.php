<?php
/**
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Smile Elastic Suite to newer
 * versions in the future.
 *
 * @category  Smile
 * @package   Smile_ElasticSuiteCore
 * @author    Aurelien FOUCRET <aurelien.foucret@smile.fr>
 * @copyright 2016 Smile
 * @license   Open Software License ("OSL") v. 3.0
 */

namespace Smile\ElasticSuiteCore\Search\Request\Query;

use Smile\ElasticSuiteCore\Search\Request\QueryInterface;

/**
 * Nested queries definition implementation.
 *
 * @category Smile
 * @package  Smile_ElasticSuiteCore
 * @author   Aurelien FOUCRET <aurelien.foucret@smile.fr>
 */
class Nested implements QueryInterface
{
    const SCORE_MODE_AVG  = 'avg';
    const SCORE_MODE_SUM  = 'sum';
    const SCORE_MODE_MIN  = 'min';
    const SCORE_MODE_MAX  = 'max';
    const SCORE_MODE_NONE = 'none';

    /**
     * @var string
     */
    private $scoreMode;

    /**
     * @var string
     */
    private $name;

    /**
     * @var integer
     */
    private $boost;

    /**
     * @var string
     */
    private $path;

    /**
     * @var QueryInterface
     */
    private $query;

    /**
     *
     * @param string                                           $name      Query name.
     * @param string                                           $path      Nested path.
     * @param \Magento\Framework\Search\Request\QueryInterface $query     Nested query.
     * @param string                                           $scoreMode Score mode of the nested query..
     * @param integer                                          $boost     Query boost.
     */
    public function __construct(
        $name,
        $path,
        \Magento\Framework\Search\Request\QueryInterface $query = null,
        $scoreMode = self::SCORE_MODE_NONE,
        $boost = QueryInterface::DEFAULT_BOOST_VALUE
    ) {
        $this->name      = $name;
        $this->boost     = $boost;
        $this->path      = $path;
        $this->scoreMode = $scoreMode;
        $this->query     = $query;
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritDoc}
     */
    public function getBoost()
    {
        return $this->boost;
    }

    /**
     * {@inheritDoc}
     */
    public function getType()
    {
        return QueryInterface::TYPE_NESTED;
    }

    /**
     * Nested query path.
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Nested query score mode.
     *
     * @return string
     */
    public function getScoreMode()
    {
        return $this->scoreMode;
    }

    /**
     * Nested query.
     *
     * @return string
     */
    public function getQuery()
    {
        return $this->query;
    }
}
