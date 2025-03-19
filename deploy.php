<?php

namespace Deployer;

require 'recipe/laravel.php';
require 'contrib/slack.php';

// Slack Configuration

set('slack_webhook', 'https://hooks.slack.com/services/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');
set('slack_success_text', 'Deployment to *{{target}}* by *_{{user}}_* was successful :100:');
set('slack_success_color', 'good');
set('slack_failure_text', 'Deployment to *{{target}}* by *_{{user}}_* failed :scream:');
set('slack_failure_color', 'danger');

// Config

set('repository', 'https://github.com/GiftyAdams/Shop.git');

set('keep_releases', 2);
add('shared_files', ['.env']);
add('shared_dirs', ['storage']);
add('writable_dirs',  []);

// Hosts

host('staging')
    ->set('remote_user', 'deployer')
    ->set('hostname', '104.131.24.24')
    ->set('application', 'shop.cropchain.co')
    ->set('labels', ['stage' => 'development'])
    ->set('branch', 'main')
    ->set('deploy_path', '/var/www/html/{{application}}')
    ->set('ssh_multiplexing', false);

// Hooks

task('build', function () {
    cd('{{release_path}}');
    run('npm install');
    run('npm run build');
});

desc('copy .env');
task('copy_env', function () {
    run('cp {{deploy_path}}/.env {{deploy_path}}/shared/.env');
    run('sudo chmod g+w {{deploy_path}}/database/database.sqlite');
});

after('deploy:update_code', 'build');

after('deploy:update_code', 'copy_env');
before('deploy:symlink', 'artisan:migrate');

after('deploy:failed', 'deploy:unlock');

after('deploy:failed', 'slack:notify:failure');
after('deploy:success', 'slack:notify:success');
