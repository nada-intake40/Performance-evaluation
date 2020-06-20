<?php
namespace App\Repositories;

use App\Models\Indicator;

/**
 * Class IndicatorRepository
 * @package App\Repositories
 */
class IndicatorRepository extends BaseRepository
{
    /**
     * IndicatorRepository constructor.
     * @param Indicator $indicator
     */
    public function __construct(Indicator $indicator)
    {
        parent::__construct($indicator);
    }
}
