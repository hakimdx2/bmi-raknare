<?php

namespace App\Calculators;

class BmiService
{
    /**
     * Calculate BMI
     * 
     * @param float $weightKg
     * @param float $heightCm
     * @return float
     */
    public function calculate(float $weightKg, float $heightCm): float
    {
        if ($heightCm <= 0) {
            return 0;
        }
        $heightM = $heightCm / 100;
        return round($weightKg / ($heightM * $heightM), 1);
    }

    /**
     * Get BMI Classification and Analysis
     * 
     * @param float $bmi
     * @param int|null $age
     * @param string|null $gender ('male', 'female')
     * @return array
     */
    public function analyze(float $bmi, ?int $age = null, ?string $gender = null): array
    {
        $isSenior = $age !== null && $age >= 65;
        $isChild = $age !== null && $age < 18;

        // Ranges definition
        // Standard WHO
        $ranges = [
            'underweight' => 18.5,
            'normal_high' => 25,
            'overweight_high' => 30
        ];

        // Classification
        $classification = 'Normalvikt';
        $classSlug = 'normal';
        $color = 'green';
        $healthRisk = 'Låg risk för viktrelaterade sjukdomar.';
        
        // Senior Logic (> 65 år): Optimal BMI is higher (22-29)
        if ($isSenior) {
            // Adjust ranges for seniors
            $ranges = [
                'underweight' => 22,
                'normal_high' => 29,
                'overweight_high' => 35 // More allowance
            ];
            
            if ($bmi < 22) {
                $classification = 'Undervikt';
                $classSlug = 'underweight';
                $color = 'yellow';
                $healthRisk = 'Risk för undernäring och benskörhet.';
            } elseif ($bmi <= 29) {
                $classification = 'Normalvikt (Senioranpassad)';
                $classSlug = 'normal';
                $color = 'green';
                $healthRisk = 'Optimal vikt för din åldersgrupp.';
            } elseif ($bmi <= 35) {
                $classification = 'Övervikt';
                $classSlug = 'overweight';
                $color = 'orange';
                $healthRisk = 'Ökad risk för hjärt-kärlsjukdomar.';
            } else {
                $classification = 'Fetma';
                $classSlug = 'obese';
                $color = 'red';
                $healthRisk = 'Hög risk för hälsoproblem.';
            }
        } else {
            // Standard Logic
            if ($bmi < 18.5) {
                $classification = 'Undervikt';
                $classSlug = 'underweight';
                $color = 'yellow';
                $healthRisk = 'Låg energireserv, risk för näringsbrist.';
            } elseif ($bmi < 25) {
                $classification = 'Normalvikt';
                $classSlug = 'normal';
                $color = 'green';
                $healthRisk = 'Hälsosam vikt.';
            } elseif ($bmi < 30) {
                $classification = 'Övervikt';
                $classSlug = 'overweight';
                $color = 'orange';
                $healthRisk = 'Förhöjd risk för diabetes typ 2 och högt blodtryck.';
            } else {
                $classification = 'Fetma';
                $classSlug = 'obese';
                $color = 'red';
                $healthRisk = 'Hög risk för följdsjukdomar. Kontakta läkare för rådgivning.';
            }
        }

        // Child Logic Warning
        $warning = null;
        if ($isChild) {
            $warning = "För barn och ungdomar (under 18 år) gäller ISO-BMI. Detta resultat är baserat på vuxna mått och kan vara missvisande.";
        }

        return [
            'bmi' => $bmi,
            'classification' => $classification,
            'slug' => $classSlug,
            'color' => $color,
            'risk_text' => $healthRisk,
            'is_senior' => $isSenior,
            'is_child' => $isChild,
            'warning' => $warning,
            'prime_range' => $isSenior ? '22 - 29' : '18.5 - 25'
        ];
    }
}
