<?php declare(strict_types=1);

$finder = PhpCsFixer\Finder::create()
    ->in([
        __DIR__ . '/',
        __DIR__ . '/app',
        __DIR__ . '/config',
        __DIR__ . '/database/factories',
        __DIR__ . '/database/seeders',
        __DIR__ . '/routes',
        __DIR__ . '/tests',
        __DIR__ . '/resources/views/auth',
        __DIR__ . '/resources/views/clips',
    ]);

$config = new PhpCsFixer\Config();

return $config
    ->setRiskyAllowed(true)
    ->setRules([
        '@PSR12' => true,
        'array_indentation' => true,
        'array_syntax' => ['syntax' => 'short'],//arrayの記述方法を短縮系にするか
        'combine_consecutive_unsets' => true,//unset(x) が続く記述を unset(x,y,...) に置き換える
        'class_attributes_separation' => ['elements' => ['method' => 'one',]],
        'multiline_whitespace_before_semicolons' => false,
        'single_quote' => true,

        'binary_operator_spaces' => [//= や => などの演算子を揃えるか
            'operators' => [
                // '=>' => 'align',
                // '=' => 'align'
            ]
        ],
        // 'blank_line_after_opening_tag' => true,//PHPの開始タグの後に一行改行を入れる
        // 'blank_line_before_statement' => true,//特定の記述の前に一行改行を入れる
        'braces' => [//各構造体は、中括弧で囲んで適切にインデントさせる必要があるためフォーマットを統一する
            'allow_single_line_closure' => true,//クロージャーを1行で書くことを許容する
        ],
        // 'cast_spaces' => true,//キャストをした時に後ろにスペースを開けるか
        // 'class_definition' => array('singleLine' => true),
        'concat_space' => ['spacing' => 'one'],//結合演算子の前後に空ける空白の指定
        'declare_equal_normalize' => true,
        'function_typehint_space' => true,//関数の返り値の型宣言にスペースが抜けていると補完する
        'single_line_comment_style' => ['comment_types' => ['hash']],
        'include' => true,//include, require, ファイルパスは、単一のスペースで区切る必要がある。ファイルパスをカッコの中に入れない
        'lowercase_cast' => true,
        // 'native_function_casing' => true,
        // 'new_with_braces' => true,//newを用いて生成したインスタンスには後方に丸括弧を必要とする
        // 'no_blank_lines_after_class_opening' => true,
        // 'no_blank_lines_after_phpdoc' => true,
        // 'no_empty_comment' => true,//空のコメントやphpdoc、ステートメントを削除する
        // 'no_empty_phpdoc' => true,
        // 'no_empty_statement' => true,
        'no_extra_blank_lines' => [
            'tokens' => [
                'curly_brace_block',
                'extra',
                // 'parenthesis_brace_block',
                // 'square_brace_block',
                'throw',
                'use',
            ]
        ],
        // 'no_leading_import_slash' => true,//use宣言先頭のバックスラッシュを削除する
        // 'no_leading_namespace_whitespace' => true,//namespaceの前にスペースがあったとき削除する
        // 'no_mixed_echo_print' => array('use' => 'echo'),//echoと`printのどちらかに記述を統一する


        'no_multiline_whitespace_around_double_arrow' => true,//=>の前後で複数行になるスペースを禁止する
        // 'no_short_bool_cast' => true,//二重感嘆符を使ったboolキャストを禁止する
        // 'no_singleline_whitespace_before_semicolons' => true,//セミコロンの前で複数行になるスペースを禁止する
        'no_spaces_around_offset' => true,
        // 'no_trailing_comma_in_list_call' => true,//リスト関数で余計なカンマを削除する
        // 'no_trailing_comma_in_singleline_array' => true,//単一行で記述する配列で余計なカンマを削除する
        // 'no_unneeded_control_parentheses' => true,
        // 'no_unused_imports' => true,//使っていないuse宣言を削除する
        'no_whitespace_before_comma_in_array' => true,//配列内で、カンマの前にスペースを禁止する
        'no_whitespace_in_blank_line' => true,//空白行でスペースを禁止する
        // 'normalize_index_brace' => true,
        'object_operator_without_whitespace' => true,
        // 'php_unit_fqcn_annotation' => true,
        // 'phpdoc_align' => true,
        // 'phpdoc_annotation_without_dot' => true,
        // 'phpdoc_indent' => true,
        // 'phpdoc_inline_tag' => true,
        // 'phpdoc_no_access' => true,
        // 'phpdoc_no_alias_tag' => true,
        // 'phpdoc_no_empty_return' => true,
        // 'phpdoc_no_package' => true,
        // 'phpdoc_no_useless_inheritdoc' => true,
        // 'phpdoc_return_self_reference' => true,
        // 'phpdoc_scalar' => true,
        // 'phpdoc_separation' => true,
        // 'phpdoc_single_line_var_spacing' => true,
        // 'phpdoc_summary' => true,
        // 'phpdoc_to_comment' => true,
        // 'phpdoc_trim' => true,
        // 'phpdoc_types' => true,
        // 'phpdoc_var_without_name' => true,
        // 'increment_style' => true,//可能であれば、インクリメントおよびデクリメント演算子はpre,postで統一してを使用する必要がある
        // 'return_type_declaration' => true,
        // 'self_accessor' => true,
        // 'short_scalar_cast' => true,
        // 'single_blank_line_before_namespace' => true,
        // 'single_class_element_per_statement' => true,
        // 'space_after_semicolon' => true,
        // 'standardize_not_equals' => true,
        'ternary_operator_spaces' => true,
        // 'trailing_comma_in_multiline' => ['elements' => ['arrays']],
        'trim_array_spaces' => true,
        'unary_operator_spaces' => true,
        'whitespace_after_comma_in_array' => true,
        'space_after_semicolon' => true,
        // 'single_blank_line_at_eof' => false
    ])
    ->setFinder($finder);
