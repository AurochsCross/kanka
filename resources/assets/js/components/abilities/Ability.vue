

<template>
    <div class="ability" v-bind:data-tags="ability.class">
        <div class="box box-solid">
            <div class="box-header with-border">
                <span class="box-title">
                    <span v-bind:class="dropdownClass()" v-click-outside="onClickOutside" v-if="permission">
                        <a v-on:click="openDropdown()" class="dropdown-toggle mr-2" role="button">
                            <i class="fa-solid fa-lock" v-if="ability.visibility_id === 2" v-bind:title="translate('admin')"></i>
                            <i class="fa-solid fa-user-lock" v-if="ability.visibility_id === 3" v-bind:title="translate('admin-self')"></i>
                            <i class="fa-solid fa-users" v-if="ability.visibility_id === 5" v-bind:title="translate('members')"></i>
                            <i class="fa-solid fa-user-secret" v-if="ability.visibility_id === 4" v-bind:title="translate('self')"></i>
                            <i class="fa-solid fa-eye" v-if="ability.visibility_id === 1" v-bind:title="translate('all')"></i>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a role="button" v-on:click="setVisibility(1)">{{ translate('all') }}</a>
                            </li>
                            <li v-if="meta.is_admin">
                                <a role="button" v-on:click="setVisibility(2)">{{ translate('admin') }}</a>
                            </li>
                            <li v-if="this.isSelf">
                                <a role="button" v-on:click="setVisibility(4)">{{ translate('self') }}</a>
                            </li>
                            <li v-if="this.isSelf">
                                <a role="button" v-on:click="setVisibility(5)">{{ translate('members') }}</a>
                            </li>
                            <li v-if="this.isSelf">
                                <a role="button" v-on:click="setVisibility(3)">{{ translate('admin-self') }}</a>
                            </li>
                        </ul>
                    </span>
                    <a role="button" v-on:click="showAbility(ability)" data-toggle="tooltip-ajax"
                       v-bind:data-id="ability.entity.id" v-bind:data-url="ability.entity.tooltip">
                      {{ ability.name }}
                    </a>
                </span>
              <div class="box-tools">
                <a role="button"
                   v-on:click="updateAbility(ability)"
                   v-if="this.canDelete"
                   class="btn btn-box-tool"
                  v-bind:title="translate('update')">
                  <i class="fa-solid fa-pencil"></i>
                </a>
                <a class="btn btn-box-tool" role="button" v-on:click="deleteAbility(ability)" v-if="this.canDelete" v-bind:title="translate('remove')">
                  <i class="fa-solid fa-trash"></i>
                </a>
              </div>
            </div>
            <div class="box-body">
                <a class="ability-image cover-background" v-if="ability.images.has" target="_blank" v-bind:href="ability.images.url"
                     v-bind:style="backgroundImage">
                </a>
                <span class="help-block">{{ ability.type }}</span>

                <div v-html="ability.entry"></div>

                <div v-html="ability.note" class="help-block"></div>

                <div v-if="ability.charges">
                    <div class="charges">
                        <div class="charge" v-for="n in ability.charges" v-on:click="useCharge(ability, n)"
                             v-bind:class="{ used: ability.used_charges >= n }">
                        </div>
                    </div>
                </div>

                <div class="text-center more-available" v-if="hasAttribute"
                     v-on:click="click(ability)">
                    <i class="fa-solid fa-chevron-down" v-if="!details"></i>
                </div>
                <div v-if="details && hasAttribute">
                    <dl class="dl-horizontal">
                        <div v-for="att in ability.attributes">
                            <div v-if="att.type == 'section'" class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">{{ att.name}}</h4>
                                </div>
                            </div>
                            <div v-else>
                                <dt>{{ att.name}}</dt>
                                <dd v-if="att.type == 'checkbox'">
                                    <i v-if="att.value == 1" class="fa-solid fa-check"></i>
                                </dd>
                                <dd v-else v-html="att.value"></dd>
                            </div>
                        </div>
                    </dl>
                </div>
                <div class="text-center more-available" v-if="hasAttribute"
                     v-on:click="click(ability)">
                    <i class="fa-solid fa-chevron-up" v-if="details"></i>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import vClickOutside from "click-outside-vue3";

    export default {
        props: [
            'ability',
            'permission',
            'meta',
            'trans',
        ],
        directives: {
            clickOutside: vClickOutside.directive
        },

        data() {
            return {
                details: false,
                openedDropdown: false
            }
        },

        computed: {
            hasAttribute: function() {
                return this.ability.attributes.length > 0;
            },
            canDelete: function() {
                return this.permission;
            },
            isSelf: function() {
                return this.meta.user_id === this.ability.created_by;
            },
            backgroundImage: function() {
                if (this.ability.images.thumb) {
                    return {
                        backgroundImage: 'url(' + this.ability.images.thumb + ')'
                    }
                }
                return {}
            }
        },

        methods: {
            click: function(ability) {
                this.details = !this.details;
            },
            deleteAbility: function(ability) {
                this.emitter.emit('delete_ability', ability);
            },
            updateAbility: function(ability) {
                axios.get(ability.actions.edit).then(response => {
                  $('#entity-modal').find('.modal-content').html(response.data);
                  $('#entity-modal').modal();
                });
            },
            showAbility: function(ability) {
                window.open(ability.actions.view, "_blank");
            },
            setVisibility: function(visibility_id) {
                var data = {
                    visibility_id: visibility_id,
                    ability_id: this.ability.ability_id,
                };
                axios.patch(this.ability.actions.update, data).then(response => {
                    this.ability.visibility_id = visibility_id;
                    this.emitter.emit('edited_ability', ability);
                })
                .catch(() => {

                });
            },
            useCharge: function(ability, charge) {
                if (charge > ability.used_charges) {
                    ability.used_charges += 1;
                } else {
                    ability.used_charges -= 1;
                }

                axios.post(ability.actions.use, {'used': ability.used_charges})
                    .then((res) => {
                        if (!res.data.success) {
                            ability.used_charges -= 1;
                        }
                    })
                    .catch(() => {
                        ability.used_charges -= 1;
                    });
            },
            translate(key) {
                return this.trans[key] ?? 'unknown';
            },
            dropdownClass() {
                return this.openedDropdown ? 'open dropdown' : 'dropdown';
            },
            openDropdown() {
                return this.openedDropdown = true;
            },
            onClickOutside (event) {
                //console.log('Clicked outside. Event: ', event)
                this.openedDropdown = false;
            },
        },
    }
</script>
