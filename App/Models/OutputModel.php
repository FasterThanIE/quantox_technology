<?php

namespace App\Models;

use App\Entity\CSM;
use App\Entity\Grade;
use App\Entity\User;

/**
 * TODO: Make a factory out of this one if u have enough time
 */
class OutputModel
{

    const OUTPUT_JSON = "json";
    const OUTPUT_XML  = "xml";

    /**
     * OutputModel constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $type = $this->determineType($user->getGrades());
        $allGrades = $this->getAllGrades($user->getGrades());
        $averageGrade = $this->getAverageGrade($allGrades);
        $this->processExport($user, $type, $allGrades, $averageGrade);
    }

    /**
     * @param User $user
     * @param string $type
     * @param array $allGrades
     * @param $averageGrade
     * @return string
     */
    private function processExport(User $user, string $type, array $allGrades, $averageGrade) : string
    {
        $fileName = str_shuffle(time());
        if($type == Grade::CSM_TYPE)
        {
            file_put_contents($fileName.".json", [
                'student_id' => $user->getId(),
                'student_name' => $user->getName(),
                'grades' => implode(",",$allGrades),
                'average' => $averageGrade,
                'result' => $averageGrade >= 7 ? "success" : "fail",
            ]);
        }
        else
        {
            // TODO : Add xml....... :(
        }
        return $fileName;
    }

    /**
     * @param object $grades
     * @return array
     */
    private function getAllGrades(object $grades) : array
    {
        $allGrades = [];
        foreach ($grades as $grade)
        {
            $allGrades[] = $grade;
        }
        return $allGrades;
    }


    /**
     * @param array $grades
     * @return float|int
     */
    private function getAverageGrade(array $grades)
    {
        return array_sum($grades) / count($grades);
    }

    /**
     * @param object $grades
     * @return string
     */
    private function determineType(object $grades) : string
    {
        return $grades[0] instanceof CSM ?
            Grade::CSM_TYPE :
            Grade::CSMB_TYPE;
    }
}