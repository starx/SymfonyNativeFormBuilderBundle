Symfony Native Form Builder Bundle
===================

This bundle allows you to to create native forms on-the-fly right at your twig file without defining the form in controller/service.

----------

Installation
-------------
Install from composer

    composer require starx/symfony-native-form-builder

#### Enable the bundle

Enable your bunndle from your `AppKernel.php`

    public function registerBundles() {
        $bundles = [
            ...,
            new Starx\SymfonyNativeFormBuilderBundle\StarxSymfonyNativeFormBuilderBundle()
        ];

        ...
        return $bundles;
    }

Usages
-------------
In any twig file:

    {%  
        set native_form = native_form_builder.getNativeFormView(
            path('your_route', {
                'id': user.id
            }),
            "GET"
    ) %}
    {{ form_start(native_form) }}
        <input class="btn btn-sm" type="submit" value="Submit" />
    {{ form_end(native_form) }}

This will create a native form without any previous declaration in controller/service.


Examples
-------------
1. Quick delete form In any twig file:

        {%
            set native_delete_form = native_form_builder.getNativeFormView(
                path('your_route_delete_action', {
                    'id': user.id
                }),
                "DELETE"
        ) %}
        {{ form_start(native_delete_form) }}
            <input class="btn btn-sm" type="submit" value="Delete"
               onClick="return confirm('Are you sure?')"
            />
        {{ form_end(native_delete_form) }}
This will generate a quick delete form in your twig file with a single button and a CSRF token with `DELETE` http method, which is recommended way to delete a entity.

2. Generating a quick form based on a predefined form type when you want to show list of entities with a small inline form on the side

        <table>
            <thead>
                ...
            </thead>
            <tbody>
                {% for entity in entities %}
                    {%
                        set native_update_form = native_form_builder.getNativeFormView(
                            path('your_enity_edit_action', {
                                'id': user.id
                            }),
                            "POST",
                            'AppBundle\\Form\\EntityType',
                            entity
                        )
                    %}
                    <tr>
                        <td>
                            {{ entity.id }}
                        </td>
                        <td>
                            {{ entity.name }}
                        </td>
                        <td>
                            {{ form_start(native_update_form) }}
                                {{ form_widget(native_update_form.value_field) }}
                                <input class="btn btn-sm" type="submit" value="Update" />
                            {{ form_end(native_update_form) }}
                        </td>
                    </tr>
                {% endfor %}
            </tbody>
        </table>
This will generate quick update forms in your twig template file where you are showing list of entities showing only one field required to update.

> **Note:**

> I do understand that such use case in twig is discouraged, but other wise to solve such requirement you would have to
> - loop through the entities in controller
> - Manually create all the forms for each of those entities
> - Pass them in a view/twig variables to your twig template file and
> - Once again, loop through them again in twig file.
>
> Instead of doing all this, as long as you don't over do it, simple use case as above should be justified.
