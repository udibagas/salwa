<h4 class="title">{{ strtoupper($group->group_name) }}</h4>
@each('forum.mobile._list', $group->forums()->active()->orderBy('created', 'DESC')->limit(5)->get(), 'a')
