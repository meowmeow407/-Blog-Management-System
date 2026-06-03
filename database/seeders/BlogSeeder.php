<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'title' => 'UPSC Civil Services Prelims Admit Card 2026 Released',
                'category' => 'Admit Card',
                'short_description' => 'The Union Public Service Commission (UPSC) has officially released the admit cards for the Civil Services Preliminary Examination 2026. Download instructions and exam day guidelines inside.',
                'content' => "The Union Public Service Commission (UPSC) has officially uploaded the e-Admit Cards for the Civil Services (Preliminary) Examination, 2026. Candidates who have registered for the exam can now download their hall tickets from the official UPSC portal.

### Steps to Download UPSC Prelims 2026 Admit Card:
1. Visit the official website of UPSC: upsc.gov.in
2. Click on the link 'e-Admit Card: Civil Services (Preliminary) Examination, 2026' in the active examinations section.
3. Read the exam day instructions carefully and click on the 'Yes' button to proceed.
4. Select login option: either by Registration ID (RID) or Roll Number.
5. Enter your RID/Roll Number, Date of Birth, and the captcha code.
6. Click on 'Submit' and your e-admit card will be displayed on the screen.
7. Download and print a clean copy of the admit card for exam day.

### Critical Exam Guidelines:
- Candidates must bring the printed copy of the e-Admit Card along with the original Photo Identity Card (whose number is mentioned in the e-Admit Card) to the examination hall in each session.
- Entry into the examination venue will be closed 10 minutes before the scheduled commencement of the examination in each session (i.e., at 09:20 AM for the Forenoon Session and at 02:20 PM for the Afternoon Session).
- Use of mobile phones, calculators, smartwatches, or any electronic equipment inside the exam hall is strictly prohibited.",
            ],
            [
                'title' => 'SSC CGL 2025 Tier-I Exam Results Declared - Download Merit List PDF',
                'category' => 'Result',
                'short_description' => 'The Staff Selection Commission has declared the results for the Combined Graduate Level (CGL) 2025 Tier-I exam. Check the cut-off marks and direct links to download candidate merit lists.',
                'content' => "The Staff Selection Commission (SSC) has officially declared the results of the Combined Graduate Level (CGL) 2025 Tier-I Examination. Millions of candidates who appeared for the exam across the country can now check their qualifying status for the Tier-II examination.

Based on the performance in the Tier-I computer-based test, candidates have been shortlisted category-wise to appear in the Tier-II examination.

### SSC CGL 2025 Tier-I Cut-Off Marks (Assistant Audit Officer & Assistant Accounts Officer):
- UR (General): 168.50
- OBC: 164.20
- SC: 154.00
- ST: 148.50
- EWS: 166.10

### How to Check Your Result:
1. Visit ssc.gov.in.
2. Click on the 'Results' tab on the homepage navigation menu.
3. Select 'CGL' category from the options.
4. Click on the PDF links corresponding to CGL 2025 Tier-I Merit List.
5. Open the PDF and use Ctrl+F to search for your name or Roll Number.
6. If your number is listed, you have successfully qualified for the next tier.

The schedules for the Tier-II Examination will be announced on the commission's website shortly.",
            ],
            [
                'title' => 'IBPS PO 2026 Updated Exam Pattern & Detailed Syllabus PDF',
                'category' => 'Syllabus',
                'short_description' => 'Get the comprehensive IBPS Probationary Officer (PO) 2026 exam pattern, section-wise mark distribution, and detailed syllabus PDF download link for prelims and mains.',
                'content' => "Preparing for the Institute of Banking Personnel Selection (IBPS) PO 2026 Exam? Having a clear understanding of the exam pattern and syllabus is crucial to structuring your study plan. Below is the detailed breakdown of the syllabus and exam structure.

### 1. Prelims Exam Pattern (Objective Test)
The preliminary exam consists of three sections with individual sectional timings:
- **English Language**: 30 Questions | 30 Marks | 20 Minutes
- **Quantitative Aptitude**: 35 Questions | 35 Marks | 20 Minutes
- **Reasoning Ability**: 35 Questions | 35 Marks | 20 Minutes
- **Total**: 100 Questions | 100 Marks | 60 Minutes

### 2. Mains Exam Pattern (Objective + Descriptive Test)
The Mains exam evaluates candidate knowledge across four core subjects plus an English writing test:
- **Reasoning & Computer Aptitude**: 45 Questions | 60 Marks | 60 Minutes
- **General/Economy/Banking Awareness**: 40 Questions | 40 Marks | 35 Minutes
- **English Language**: 35 Questions | 40 Marks | 40 Minutes
- **Data Analysis & Interpretation**: 35 Questions | 60 Marks | 45 Minutes
- **Descriptive Test (Letter Writing & Essay)**: 2 Questions | 25 Marks | 30 Minutes

### Core Topics to Focus On:
- **Quantitative Aptitude**: Data Interpretation, Simplification/Approximation, Quadratic Equations, Number Series, Arithmetic Word Problems.
- **Reasoning**: Puzzles & Seating Arrangements, Syllogism, Blood Relations, Coding-Decoding, Inequality.
- **English**: Reading Comprehension, Cloze Test, Error Spotting, Para Jumbles.

You can download the full detailed syllabus PDF from the link given in our sidebar widgets.",
            ],
            [
                'title' => 'SBI Specialist Officer Recruitment 2026: Apply online for 1,500+ vacancies',
                'category' => 'Job Alerts',
                'short_description' => 'State Bank of India is inviting online applications from eligible Indian citizens for recruitment to various Specialist Cadre Officer posts. Check eligibility criteria and apply online.',
                'content' => "State Bank of India (SBI) has released an official recruitment notification for 1,500+ Specialist Cadre Officer (SCO) vacancies on a regular and contract basis. Eligible candidates can apply online through the official bank portal.

### Important Recruitment Dates:
- **Online Application Start Date**: June 10, 2026
- **Last Date to Apply Online**: June 30, 2026
- **Tentative Exam Date**: August 2026

### Vacancies & Roles:
- **Systems Officer (IT)**: 600 posts
- **Database Administrator**: 250 posts
- **Cyber Security Specialist**: 350 posts
- **Network Engineer**: 300 posts

### Eligibility Criteria:
- **Educational Qualification**: Candidates must hold a B.E/B.Tech in Computer Science/IT/Electronics or MCA/M.Sc (CS/IT) from a recognized university.
- **Experience**: A minimum of 2-5 years of post-qualification work experience is required depending on the scale of the post.
- **Age Limit**: Minimum 25 years and maximum 38 years as of June 1, 2026 (relaxable for reserved categories as per government norms).

### Application Fees:
- **General/EWS/OBC**: ₹750/-
- **SC/ST/PwBD**: Exempted from fee payment.

Interested candidates can submit their applications on the official SBI careers page: sbi.co.in/web/careers.",
            ],
            [
                'title' => 'National Education Policy: UGC Announces New Guidelines for Dual Degrees',
                'category' => 'News',
                'short_description' => 'The University Grants Commission (UGC) has introduced a historical policy allowing students to pursue two full-time academic degree programs simultaneously in India.',
                'content' => "In alignment with the National Education Policy (NEP), the University Grants Commission (UGC) has released fresh guidelines enabling students in India to pursue two academic degrees simultaneously. 

This historic policy applies to undergraduate, postgraduate, and diploma courses, allowing students to earn qualifications in completely different fields at the same time.

### Key Features of UGC Dual Degree Guidelines:
1. **Modes of Study**: A student can pursue two full-time degrees in physical mode, provided that class timings do not overlap. Alternatively, they can study one in physical mode and another in online/open distance learning (ODL) mode.
2. **Interdisciplinary Choices**: A student can mix science, arts, commerce, and engineering streams. For example, a student can study a B.Sc. in Physics alongside a B.A. in English Literature.
3. **No Retrospective Benefit**: These guidelines are effective from the current academic year and do not apply to students who completed dual degrees prior to the notification date.

UGC Chairman commented: 'This move will provide students with the flexibility to develop multidisciplinary skills, preparing them better for modern job markets.'",
            ],
            [
                'title' => 'RRB NTPC 2026 Admit Card and Exam Center City Info Released',
                'category' => 'Admit Card',
                'short_description' => 'Railway Recruitment Board (RRB) has activated links to check the exam center city, date of exam, and travel pass for RRB NTPC Stage-1 CBT 2026. Hall tickets available for download.',
                'content' => "The Railway Recruitment Board (RRB) has activated the link to check the Exam City, Exam Date, and Travel Authority Pass for SC/ST candidates for the upcoming NTPC (Non-Technical Popular Categories) Stage-1 Computer Based Test (CBT).

Candidates can download their actual call letters 4 days prior to their exam date.

### How to Check Exam City and Download e-Call Letter:
1. Visit the regional RRB website you applied to (e.g., rrbcdg.gov.in, rrbpatna.gov.in).
2. Click on the NTPC exam link for 'Exam City and Date Intimation Slip'.
3. Enter your Registration Number and User Password (Date of Birth).
4. Click on 'Login'.
5. The exam city, date, and shift time will be displayed. If your exam is scheduled in 4 days, the link to download the admit card will be active.

Make sure to carry a color printout of your admit card, a valid photo ID, and a passport-size photo to the examination center.",
            ],
            [
                'title' => 'NEET UG 2026 Merit List and Category Wise Cut-Off Marks Released',
                'category' => 'Result',
                'short_description' => 'The National Testing Agency (NTA) has declared the result of the National Eligibility cum Entrance Test (NEET-UG) 2026. Check the topper scores, percentile, and counseling dates.',
                'content' => "The National Testing Agency (NTA) has officially declared the NEET UG 2026 entrance exam results. Along with the result scorecard, NTA has also released the all-India rank merit list and category-wise qualifying cut-off percentiles.

Over 2 million students appeared for the examination aiming for medical admissions to MBBS, BDS, and AYUSH courses.

### NEET UG 2026 Cut-Off Percentiles & Marks:
- **UR/EWS (General)**: 50th Percentile | Marks Range: 720-137
- **OBC/SC/ST**: 40th Percentile | Marks Range: 136-107
- **UR-PH**: 45th Percentile | Marks Range: 136-121
- **OBC/SC/ST-PH**: 40th Percentile | Marks Range: 120-107

### Counseling Details:
The Medical Counseling Committee (MCC) will begin registration for NEET 15% All India Quota (AIQ) counseling in the last week of June. Candidates who qualified are advised to keep their rank cards, class 10/12 mark sheets, and category certificates ready for verification.",
            ],
            [
                'title' => 'GATE 2027 Detailed Syllabus and Exam Structure Announced',
                'category' => 'Syllabus',
                'short_description' => 'IIT Roorkee, the conducting authority of GATE 2027, has released the official syllabus and subject-wise paper guidelines for all 30 papers. Learn about changes in syllabus.',
                'content' => "The official syllabus and information brochure for the Graduate Aptitude Test in Engineering (GATE) 2027 has been released by IIT Roorkee. Candidates appearing for GATE 2027 can review the updated syllabus for their respective disciplines on the official portal.

### GATE 2027 Exam Highlights:
- **Papers**: 30 different subjects. Candidates can choose up to two papers from selected combinations.
- **Format**: Computer-Based Test (CBT) consisting of Multiple Choice Questions (MCQ), Multiple Select Questions (MSQ), and Numerical Answer Type (NAT) questions.
- **Duration**: 3 Hours | Total Marks: 100

### Key Sections:
1. **General Aptitude (GA)**: Common to all papers (15 Marks).
2. **Engineering Mathematics**: Common to most engineering papers (13 Marks).
3. **Core Subject Section**: Disciplinary topics (72 Marks).

### Syllabus Changes:
IIT Roorkee has introduced minor topic revisions in the Data Science & Artificial Intelligence (DA) paper, emphasizing deep learning architectures and database security. 

Download the official syllabus PDF from gate2027.iitr.ac.in.",
            ],
            [
                'title' => 'LIC Apprentice Development Officer (ADO) Recruitment 2026: 8,000+ Openings',
                'category' => 'Job Alerts',
                'short_description' => 'Life Insurance Corporation of India (LIC) has announced 8,000+ vacancies for Apprentice Development Officers across multiple divisions. Check divisional vacancies and deadlines.',
                'content' => "Life Insurance Corporation of India (LIC), a premier public sector financial institution, is inviting online applications for the recruitment of Apprentice Development Officers (ADOs) across its various zones.

### Important Recruitment Dates:
- **Registration Starts**: July 1, 2026
- **Registration Deadline**: July 25, 2026
- **Preliminary Examination**: September 5, 2026

### Vacancies by Zones:
- **North Zone (New Delhi)**: 1,200 vacancies
- **Central Zone (Bhopal)**: 900 vacancies
- **Eastern Zone (Kolkata)**: 1,100 vacancies
- **Western Zone (Mumbai)**: 1,400 vacancies
- **Southern Zone (Chennai)**: 1,300 vacancies

### Qualifications:
- **Education**: Candidates must possess a Bachelor's Degree in any discipline from a recognized university. Preference is given to candidates with diplomas in marketing or insurance.
- **Age Limit**: Candidates must have completed 21 years and should not be older than 30 years as of July 1, 2026.",
            ],
            [
                'title' => 'Education Ministry to Launch Integrated Student Portal for All Competitive Exams',
                'category' => 'News',
                'short_description' => 'The government will introduce a single sign-on competitive portal to consolidate registration, updates, and results for JEE, NEET, CUET, and other national level entrance exams.',
                'content' => "In a major digital push, the Union Ministry of Education has announced plans to launch an integrated National Competitive Exam Portal. The portal will serve as a single gateway for candidates appearing in various national-level exams such as JEE, NEET, CUET, UGC NET, and others.

### Benefits of the Integrated Portal:
- **Single Sign-On (SSO)**: Candidates only need to create a profile once. Their basic details, documents, and identity verifications will be stored securely and applied to any exam registration.
- **Integrated Alerts**: Notifications regarding exam dates, admit cards, and results will be sent through a single SMS/email system.
- **Resource Repository**: Official mock tests, previous year papers, and syllabus updates will be available for free.

The portal is expected to go live in the upcoming academic cycle, reducing registration workloads and ensuring clean, direct communication with candidates.",
            ],
        ];

        foreach ($posts as $post) {
            Blog::create([
                'title' => $post['title'],
                'slug' => Str::slug($post['title']),
                'short_description' => $post['short_description'],
                'content' => $post['content'],
                'image_path' => null,
                'category' => $post['category'],
                'created_at' => now()->subDays(rand(1, 30)),
            ]);
        }
    }
}
