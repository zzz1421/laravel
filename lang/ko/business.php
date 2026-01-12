<?php
return [
    // [공통] 교육사업 헤더 & 탭
    'edu_title' => '교육사업',
    'edu_desc' => '국제 표준에 기반한 전문 기술 교육으로 현장의 안전 전문가를 양성합니다.',
    'edu_tab_copc' => 'IECEx CoPC',
    'edu_tab_tech' => '방폭기술교육',
    'edu_tab_motor' => '모터기술교육',
    'edu_tab_hydrogen' => '수소안전교육',
    'edu_tab_ess' => 'ESS 안전',
    'edu_tab_sil' => 'SIL 교육',
    'edu_btn_apply' => '교육 신청하기',
    'edu_btn_detail' => '교육 커리큘럼 자세히 보기',

    // 1. IECEx CoPC
    'copc_title' => 'IECEx 개인자격인증 교육',
    'copc_p1' => '폭발위험시설의 안전은 안전관리, 계획, 설치, 운영, 검사, 유지보수, 수리 및 기타 여러가지 활동을 다루는 모든 사람의 능력에 크게 좌우됩니다.',
    'copc_p2' => 'IECEx PCC-Scheme은 폭발 위험장소에서 일하는 개인의 역량평가 및 인증을 제공합니다. 모듈식 역량구조를 기반으로 하는 맞춤형 역량 프로필은 직무에서 후보자의 실제 업무와 작업에 완벽하게 부합하는 인증을 받을 수 있습니다.',
    'copc_box' => '능력에 대한 인증서 (Certificates of competence)는 개인의 지식과 기술에 대한 독립적인 증거를 제공합니다.',
    
    'rtp_title' => 'IECEx RTP<br>공인 교육기관',
    'rtp_desc' => '포엑스(주)는 IECEx로부터 검토를 받았으며, IECEx Training Provider Program에 따라 프로세서를 구현한 것으로 인정되었습니다.',
    'rtp_check1' => 'RTP 자격 부여는 IECEx 운영문서 OD 521에 따라 검토된 관련 교육서비스를 제공하겠다는 약속을 나타냅니다.',
    'rtp_check2' => 'RTP에서 제공하는 교육은 신청자의 지식을 향상시키고 IECEx CoPC scheme에 따른 평가를 준비하기 위한 것입니다.',
    
    'unit_title' => 'CoPC Unit 소개',
    'unit_th_code' => 'Code',
    'unit_th_desc' => '교육 내용 (Description)',
    
    // CoPC Units 데이터 (배열)
    'copc_units' => [
        ['000', '폭발위험장소를 포함하는 현장의 출입을 위한 기본 지식 및 인식', 'Basic knowledge and awareness to enter a site which includes a classified hazardous area'],
        ['001', '폭발성 분위기에서의 방폭 기본 원리', 'Principles of protection in explosive atmospheres'],
        ['002', '폭발위험장소의 구분', 'Perform classification of hazardous areas'],
        ['003', '방폭기기 및 배선 시스템의 설치', 'Install explosion-protected equipment and wiring systems'],
        ['004', '폭발성 분위기에서 사용되는 기기의 유지관리', 'Maintain equipment in explosive atmospheres'],
        ['005', '방폭기기의 정비 및 수리', 'Overhaul and repair of explosion-protected equipment'],
        ['006', '폭발성 분위기 내 또는 폭발성 분위기와 관련된 전기설비의 시험', 'Test electrical installations in or associated with explosive atmospheres'],
        ['007', '폭발성 분위기 내 또는 폭발성 분위기와 관련된 전기설비에 대한 육안 및 근접 검사의 수행', 'Perform visual and close inspection of electrical installations in or associated with explosive atmospheres'],
        ['008', '폭발성 분위기 내 또는 폭발성 분위기와 관련된 전기설비에 대한 정밀 검사의 수행', 'Perform detailed inspection of electrical installations in or associated with explosive atmospheres'],
        ['009', '폭발성 분위기 내 또는 폭발성 분위기와 관련된 전기설비의 설계', 'Design electrical installations in or associated with explosive atmospheres'],
        ['010', '폭발성 분위기 내 또는 폭발성 분위기와 관련된 전기설비에 대한 감사의 수행', 'Perform audit inspection of electrical installations in or associated with explosive atmospheres'],
        ['011', '수소 시스템의 안전에 대한 기본지식 수행', 'Basic knowledge of the safety of hydrogen systems'],
    ],

    // 2. 방폭기술교육
    'tech_title' => '방폭기술교육',
    'tech_list_1' => '포엑스(주)는 방폭분야의 세부 기술교육을 제공합니다.',
    'tech_list_2' => '방폭기술의 기본기술에 대한 교육과, 방폭기기의 개발자에게 필요한 방폭 보호형식 및 설계에 대한 교육훈련 프로그램을 운영하고 있습니다.',
    'tech_list_3' => '풍부한 경험과 역량으로 실무에 적용할 수 있는 다양한 사례를 공유하여 차별화된 교육을 받으실 수 있습니다.',
    // Tech Grid & Swiper
    'tech_g1' => '방폭의 기본',
    'tech_g2' => '방폭보호형식',
    'tech_g3' => '본질안전 교육',
    'tech_g4' => '방폭기기의 설계 및 인증',
    'tech_s1' => 'Flamepath 구조 실습',
    'tech_s2' => '현장 안전 수칙',
    'tech_s3' => '본질안전 회로 설계',
    'tech_s4' => '인증 문서 작성',

    // 3. 모터기술교육
    'motor_title' => '모터기술교육',
    'motor_list_1' => '전기추진시스템의 핵심요소인 모터 및 그 응용기술이 매우 중요하며, 폭발위험구역 증가에 따라 방폭기술의 접목이 요구되고 있습니다.',
    'motor_list_2' => '포엑스(주)에서는 방폭을 포함한 모터응용과 관련된 인재육성에 기여하고자 하는 사명과 비전을 가지고 차원 높은 교육 서비스를 제공합니다.',
    'motor_g1' => '모터의 기본 원리',
    'motor_g2' => '모터 Topologies',
    'motor_g3' => '모터의 국제규격',
    'motor_g4' => '방폭모터 기술',
    'motor_g5' => '방폭모터의 수리',

    // 4. 수소안전교육
    'hydro_title' => '수소안전교육',
    'hydro_list_1' => '수소는 가연성 물질로 매우 넓은 폭발가능 범위를 가지고 있고, 낮은 스파크 에너지로도 폭발사고가 발생할 수 있습니다.',
    'hydro_list_2' => '포엑스(주)에서는 수소의 안전한 활용과 개발을 위해 수소안전에 대한 기술교육을 제공합니다.',
    'hydro_g1' => '수소의 특성과 위험',
    'hydro_g2' => '수소연료전지의 폭발안전',
    'hydro_g3' => '수소선박의 안전',

    // 5. ESS 안전
    'ess_title' => 'ESS 안전',
    'ess_list_1' => '리튬 배터리 시스템은 열폭주로 인한 사고의 위험이 매우 높고, 화재폭발사고가 지속적으로 발생하고 있습니다.',
    'ess_list_2' => '포엑스(주)에서는 ESS의 위험의 식별과 안전한 적용을 위한 기술교육을 제공합니다.',
    'ess_g1' => '리튬이온 배터리 시스템의 위험과 안전',
    'ess_g2' => '선박용 리튬 배터리 기반의 ESS 화재폭발 안전',
    'ess_s1' => '선박용 리튬 배터리 기반의<br>ESS 화재폭발 안전',
    'ess_s2' => '리튬이온 배터리 시스템의<br>위험과 안전',
    'ess_s3' => 'BMS 이해와 적용',

    // 6. SIL 교육
    'sil_title' => 'SIL 교육',
    'sil_list_1' => '친환경 에너지의 요구로 인한 프로세스 산업의 변화와 자동화의 급속한 확대로 시스템의 안전도에 대한 기술능력이 크게 요구되고 있습니다.',
    'sil_list_2' => 'SIL (Safety Integrity Level) 기술의 확대와 요구되는 지식을 해결하기 위해 포엑스(주)가 교육을 제공합니다.',
    'sil_list_3' => '포엑스(주)는 SIL 전문기업과의 협력을 통해 수준 높은 SIL교육과 폭발안전을 연계한 차별화된 교육 서비스를 제공합니다.',
    'sil_g1' => 'SIL (Safety Integrity Level) 기술의 기본과 응용',
    'sil_s1' => 'SIL 기술의 기본과 응용',
    'sil_s2' => '전문가 양성 교육',
    'sil_s3' => '현장 적용 사례',

    // [컨설팅]
    'cons_title' => '컨설팅',
    'cons_desc' => '국제 표준 규격에 맞춘 전문 컨설팅으로 인증 획득과 품질 향상을 지원합니다.',
    
    // Tab 1: 방폭 제품인증
    'cons_tab_product' => '방폭 제품인증 컨설팅',
    'cons_prod_subtitle' => 'Explosion proof Equipment Certification Consulting (IECEx, ATEX, UL, KCs)',
    
    // Process Flow
    'proc_develop' => 'Develop',
    'proc_app' => 'Application',
    'proc_docs' => 'Documents',
    'proc_prod' => 'Product',
    'proc_qs' => 'Quality System',
    'proc_test' => 'TEST',
    'proc_cert' => 'Certification',

    // Lists (Product)
    'prod_list_1' => 'Strategy support',
    'prod_list_2' => 'Document review',
    'prod_list_3' => 'Design Review',
    'prod_list_4' => 'Procedure support',
    'prod_list_5' => 'CB, NB, TL Arrange',
    'prod_list_6' => 'Gap assessment',
    'prod_list_7' => 'Certification procedure support',
    'prod_list_8' => 'Quality management system',
    'prod_list_9' => 'Non-Conformance solution',
    
    'prod_note_1' => 'Conformity assessment service for Ex products and Ex quality system',
    'prod_note_2' => 'Corrective action support for non-conformity',
    
    'btn_cons_inquiry' => '컨설팅 문의하기',

    // Tab 2: 품질 시스템
    'cons_tab_quality' => '품질 시스템 컨설팅',
    'qual_list_1' => 'IECEx Service Facility Certification Consulting',
    'qual_list_2' => 'Quality Management System Development Consulting',
    'qual_list_3' => 'Consulting services for repair facility certification',
    'qual_list_4' => 'Consulting services for inspection and maintenance facility certification',
    
    'btn_qual_inquiry' => '품질시스템 문의하기',

    // [기술용역]
    'tech_svc_title' => '기술용역',
    'tech_svc_desc' => '위험성 평가 및 안전기준 개발을 통해 최적의 안전 솔루션을 제공합니다.',
    
    'ts_tab_risk' => '위험성 평가',
    'ts_tab_standard' => '안전기준개발',

    // Tab 1: Risk Assessment
    'ts_risk_title' => '위험성 평가',
    'ts_risk_list_1' => '포엑스(주)는 기술용역으로 위험성 평가 (Risk assessment) 서비스를 제공합니다.',
    'ts_risk_list_2' => '위험성 평가는 다양한 산업분야에 적용되는 안전기술로 신기술 적용과 친환경 수소에너지 및 ESS 등의 개발에 요구되는 기술입니다.',
    'ts_risk_list_3' => '당사는 수소선박 및 연료전지 분야에 대한 위험성 평가 이력을 바탕으로 효율적이고 적합한 위험성 평가 서비스를 실시하고 있습니다.',
    
    // Risk Method Table Headers
    'ts_th_method' => 'Method',
    'ts_th_cost' => '시간, 비용 및 전문성',
    'ts_th_uncert' => '불확실성',
    'ts_th_complex' => '복잡도',
    'ts_th_quant' => '정량적 결과 표현',
    'ts_compare_title' => '위험성 평가 기법 비교',

    // Table Values (Common terms)
    'val_low' => '낮음',
    'val_med' => '보통',
    'val_high' => '높음',
    'val_imp' => '불가능',
    'val_pos' => '가능',
    'val_any' => 'Any',

    // Tab 2: Standard Development
    'ts_std_title' => '안전기준개발',
    'ts_std_list_1' => '포엑스(주)는 플랜트나 작업장의 특성을 고려한 안전기준 개발을 지원합니다.',
    'ts_std_list_2' => '대상의 위험을 분석하고 위험성 평가와 연계하여 대응방향을 수립합니다.',
    'ts_std_list_3' => '데이터와 분석을 기반으로 안전절차서를 도출하고, 작업장에 적용 가능한 안전기준을 제정하여 드립니다.',
    'ts_std_list_4' => '이를 통해 중대재해를 예방하고, 안전한 작업장을 유지하며 법적 요구사항을 충족할 수 있도록 기술지원을 해 드립니다.',
    
    'btn_std_inquiry' => '안전기준 개발 문의하기',

    // [엔지니어링]
    'eng_title' => '엔지니어링',
    'eng_desc' => '현장 맞춤형 설계와 시공으로 가장 안전한 방폭 솔루션을 구축합니다.',
    
    // Tab Names
    'eng_tab_design' => '폭발위험장소 설계',
    'eng_tab_inspection' => '방폭검사 및 유지보수',
    'eng_tab_diagnosis' => '안전진단',
    'eng_tab_selection' => '방폭기기 선정 및 설치설계',
    'eng_tab_construction' => '방폭시공',
    'eng_tab_facility' => 'IECEx Service Facility',

    // Tab 1: Design
    'eng_design_p1' => '폭발위험구역 설정은 플랜트의 설계단계에서 진행됩니다. 이는 전문지식과 역량이 확보된 곳에서 이루어져야 합니다.',
    'eng_design_p2' => '포엑스(주)는 IEC 60079-10-1과 IEC 60079-10-2를 기반으로 이 서비스를 제공합니다.',
    'eng_design_p3' => '한국에서 운영하는 기술지침과 기준은 IEC의 표준내용을 채택하고 있습니다.',
    'eng_design_p4' => '변경관리는 신규 공장이 아닌 운영 현장에서도 이루어져야 하며, 이는 사고 예방에 매우 중요한 요소입니다.',
    'eng_design_p5' => '특히, 포엑스(주)는 상세한 분석을 통해 <span class="bg-amber-200 px-1 font-bold">폭발위험구역을 최소화</span>하도록 설계하는 것을 목표로 하고 있습니다.',
    
    'eng_design_list_1' => '방폭설치설계 서비스',
    'eng_design_list_2' => '방폭기기선정 서비스',
    'eng_design_list_3' => '문서준비 지원',
    'eng_design_list_4' => '설계검증 서비스',

    // Tab 2: Inspection
    'eng_insp_p1' => '폭발사고를 예방하고 안전한 플랜트 운영을 위해서는 적합한 유지보수가 필요합니다. 이를 위해 주기적인 방폭검사가 요구됩니다.<br>이를 토대로 폭발위험구역은 적절한 유지보수를 통해 관리되어야 합니다.',
    'eng_insp_p2' => '포엑스(주)는 <span class="font-bold text-gray-900">IECEx의 인증된 Service Facility</span>로서<br>국제적으로 승인된 품질시스템을 바탕으로 적합한 기술서비스를 제공합니다.',
    
    'eng_insp_list_1' => '방폭검사 서비스 (IEC 60079-14 and IEC 60079-17)',
    'eng_insp_list_2' => '최초검사 및 주기검사',
    'eng_insp_list_3' => '연속적 유지관리',
    'eng_insp_list_4' => '육안검사, 근접검사 및 정밀검사',
    'eng_insp_list_5' => '방폭유지보수 서비스',
    'eng_insp_list_6' => '방폭기술지원 서비스',
    
    'eng_insp_subtitle1' => '부적합 사례',
    'eng_insp_subtitle2' => '검사보고서',

    // Tab 3: Diagnosis
    'eng_diag_p1' => '포엑스(주)는 안전한 작업장 관리를 위한 기술지원을 실시합니다.<br>풍부한 경험과 전문성을 바탕으로 작업장과 플랜트의 안전을 검사하고 대책을 수립합니다.',
    'eng_diag_p2' => '전문가 집단과 협업으로 통합적인 안전관리 솔루션을 제공하고 있으며, <span class="bg-amber-100 px-1 font-bold">당사의 IT 솔루션</span>을 적용하여 효율적인 검사 진단과 안전관리를 지원하고 있습니다.',
    'eng_diag_card1' => '안전진단 솔루션제공',
    'eng_diag_card2' => '안전진단 기술지원',
    'eng_diag_card3' => '안전진단 대책수립',

    // Tab 4: Selection
    'eng_sel_p1' => '폭발위험구역 설정이 완료되면 해당 지역에 기기(Equipment) 배치를 위한 설계가 진행됩니다.',
    'eng_sel_p2' => '해당 지역에 적합한 방폭기기를 선정해야 합니다.',
    'eng_sel_p3' => '포엑스(주)는 방폭기기의 선정 및 설치설계를 위한 엔지니어링 서비스를 제공합니다.',
    
    'eng_sel_list_1' => 'IEC 규격에 따른 폭발위험구역 설정',
    'eng_sel_list_2' => '폭발위험구역 저감 기술',
    'eng_sel_list_3' => '폭발위험구역에 영향을 주는 항목에 대한 변경관리 서비스',

    // Process Bar
    'eng_proc_1' => '누출원 분석',
    'eng_proc_2' => '누출등급 분석',
    'eng_proc_3' => '누출 특성',
    'eng_proc_4' => '영역 형식',
    'eng_proc_5' => '환기 분석',
    'eng_proc_6' => 'Extent of zone',

    // Tab 5: Construction
    'eng_const_p1' => '방폭기기의 설치는 전문적인 지식과 기술 및 경험을 바탕으로 수행되어야 합니다.',
    'eng_const_p2' => '포엑스(주)는 선정된 방폭장비 및 설계된 방폭설치에 적합한 방폭설치 서비스를 제공합니다.',
    
    'eng_const_list_1' => 'IEC 60079 규격에 적합한 방폭설치 서비스',
    'eng_const_list_2' => '방폭설치 보고서 준비 지원',
    'eng_const_list_3' => '모터 시운전 서비스',

    // Tab 6: Facility
    'eng_fac_p1' => '폭발의 위험이 있는 상업 시설의 안전은 해당 시설의 전체 수명 주기 동안 안전과 관련하여 수행된 모든 활동의 적합성 여부에 크게 의존합니다. 이러한 가운데, 핵심역량에 속하지 않는 업무를 외주에 맡기는 업계의 추세로 인해 시설의 안전을 책임지는 서비스 제공업체가 더욱 늘어나고 있는 상황입니다.',
    'eng_fac_p2' => '이에 IECEx에서는 Certified Service Facilities 인증 제도를 두어 장비 수리, 검사, 유지보수 및 기타 안전 관련 서비스를 제공하는 업체에 대한 평가와 인증을 제공하고 있으며, 서비스 제공업체에 대한 평가는 <span class="bg-amber-100 px-1 font-bold text-gray-900">전문 장비, 직원의 역량, 품질관리 시스템</span>에 초점을 두고 있습니다.',
    'eng_fac_p3' => '이러한 인증 제도를 통해 업계는 적합한 파트너를 선택하는 데 도움을 받을 수 있고, 서비스 제공업체는 자신의 역량을 효과적으로 홍보할 수 있습니다.',
    
    'eng_fac_list_1' => '포엑스(주)는 IECEx 03-4 프로그램 방폭검사 및 유지보수를 위한 인증된 IECEx Service Facility 입니다.',
    'eng_fac_list_2' => '본 프로그램의 한국 최초 인증획득 기관이며, 세계에서는 3번째로 획득하였습니다.',
    
    'btn_eng_inquiry' => '설계 견적 문의하기',

    // [연구개발]
    'rnd_title' => '연구개발',
    'rnd_desc' => '끊임없는 기술 혁신과 R&D로 안전한 미래 기술을 선도합니다.',
    
    'rnd_tab_device' => '방폭기기 설계',
    'rnd_tab_hydrogen' => '수소안전 설계',

    // Tab 1: Ex Device Design
    'rnd_dev_title' => '방폭기기 설계',
    'rnd_dev_list_1' => '포엑스(주)는 폭발위험구역에 적용 가능한 방폭기기의 설계를 지원합니다.',
    'rnd_dev_list_2' => '방폭 규정의 적용과 제품의 이해를 바탕으로 제품의 방폭 설계와 해결방안을 도출합니다.',
    'rnd_dev_list_3' => '방폭기기의 설계과정에서 시험의 요구사항과 항목, 인증에 필요한 정보를 제공하며 국제방폭인증 획득이 가능한 제품의 개발을 연구합니다.',
    'rnd_dev_list_4' => '전자계해석기술, 기계구조 및 유체유동, 열해석 기술을 적용하여 시뮬레이션을 통한 개발비 절감과 최적화를 수행합니다.',
    'rnd_dev_list_5' => '새로운 구조의 방폭기기 개발이 필요하시면 포엑스(주)가 도움을 드릴 수 있습니다.',
    
    // Design Cards
    'rnd_dev_card1' => '기구 설계 및 구조 해석',
    'rnd_dev_card2' => '화염길(Flamepath) 설계',
    'rnd_dev_card3' => '전자계 해석 및 최적화',
    
    // Process Diagram
    'rnd_proc_title' => 'Design Optimization Process',
    'rnd_step_1' => 'System Requirements',
    'rnd_step_1_sub' => 'Load characteristics, Size etc.',
    'rnd_step_2' => 'Motor Specifications',
    'rnd_step_2_sub' => 'Voltage, Torque etc.',
    'rnd_step_3' => 'Preliminary design',
    'rnd_step_3_sub' => 'Magnetic Equivalent Circuit<br>장하분배법/D²L법', // 영문 용어는 그대로
    'rnd_step_4' => 'Detail-design',
    'rnd_step_4_sub' => 'Finite Element Analysis<br>Magnetic saturation etc.',
    'rnd_step_5' => 'Optimization',
    'rnd_step_5_sub' => 'Deterministic / Stochastic method<br>Performance optimization',

    // Tab 2: Hydrogen Safety Design
    'rnd_hyd_title' => '수소안전 설계',
    'rnd_hyd_list_1' => '포엑스(주)에서는 수소의 폭발안전을 위한 제품 및 시스템 안전 설계를 제공합니다.',
    'rnd_hyd_list_2' => '규격을 기반으로 안전 기준을 분석하고 해당 시장에 진입하기 위한 요건을 검토합니다.',
    'rnd_hyd_list_3' => '폭발안전을 위한 방폭규정을 분석하고 이를 제품에 적용할 수 있도록 지원합니다.',
    
    // Hydrogen Cards
    'rnd_hyd_card1' => '수소 가스감지시스템<br>설치 설계',
    'rnd_hyd_card2' => '수소연료전지 시스템<br>안전 설계',
    'rnd_hyd_card3' => '수소연료공급 시스템<br>안전 설계',
    
    'btn_rnd_inquiry' => 'R&D 기술 협력 문의',
];