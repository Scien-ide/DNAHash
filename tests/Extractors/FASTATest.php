<?php

namespace DNATools\Tests\Extractors;

use DNATools\Extractors\FASTA;
use PHPUnit\Framework\TestCase;

/**
 * @group Extractors
 * @covers \DNATools\Extractors\FASTA
 */
class FASTATest extends TestCase
{
    /**
     * @var \DNATools\Extractors\FASTA
     */
    protected $extractor;

    /**
     * @before
     */
    protected function setUp() : void
    {
        $this->extractor = new FASTA('tests/test.fasta');
    }

    /**
     * @test
     */
    public function extract() : void
    {
        $expected = [
            'ERZ1283763.1 NODE_7133_length_2790_cov_4.508074' => 'TGAGCATTCCCGATATGGTTCTCATTCATGCAGGCACTAATGATATGTTGCAAAACTATTCCGTCAATCATGCTGTAGATCATATTCGAGAAACGATTGATGTGCTACGCCAAAGAAATCCAAATACAGATTGGCAATTACATGAATTTCGCAGGTATCTCAAAAAAAATGGATACCCAAATCATGCAAATACGTTAATGGATTTATGGAAAAATCCATATCAATCAAACGCAAAAGAAA',
            'ERZ1283763.2 NODE_10089_length_2172_cov_4.555501' => 'TATCCAAGTGATTTACATGCAGATCTCATATAGCAAAGATGTTAAATAATACAAAAAATAACCACTTTTCATCGTATCAATATAGGTCCGTCAAGACAATTTTGAAATATTGATGCTACGGATTTATATGTTTTAATATTCTTTTAAGGAAAGTCTGCGGGAGTCCTTGAGGTAGAAAATTGAAATTATTTTGAGGAGAAAAAGAATTTTGAACGAAGGAGTTTTGCCGTAGTAAAGGGA',
            'ERZ1283763.3 NODE_3715_length_4437_cov_5.132715' => 'AAGAAAAGTTTTCAATTCTTAGTGCAATAAATGCTCATACCAAAATTCTTTTTTTTAATTAAGCTGATCAATTTTTACAAAAAACAACATCGAATGTCAACATCTTTTTCTCCAATTAGAAAAAACAATCATCACCAGCTAACGTCATAATCGGTTTCGACATTTTTGACATATGAACTTTAAAGGTGATACCCTTTAGATACTCAGTTTATACTAAAAATAACAACCTTATATCTATAA',
        ];

        $reads = iterator_to_array($this->extractor);

        $this->assertEquals($expected, $reads);
    }
}
