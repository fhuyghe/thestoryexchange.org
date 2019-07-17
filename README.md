Installation
---

Clone repo and get a valid `.vault_pass` file for ansible vault.

```
cd trellis
vagrant up
```

On successful provision:

```
vagrant ssh # access local machine
sudo apt-get install ansible # install ansible on linux machine
cd trellis
ansible-playbook dev.yml # set up local networking and wordpress config
```

#### Pain points

- Make sure a Github access token is installed locally and the dependent private repositories are accesible
- Some plugins may break on the virtual machine and will need to be disabled using the Wordpress CLI. I had an issue with:
  - `schema-and-structured-data-for-wp`
  - `accelerated-mobile-pages`
